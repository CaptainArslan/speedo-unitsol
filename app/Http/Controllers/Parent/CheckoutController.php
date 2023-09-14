<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationEmail;
use App\Mail\PaymentConfirmationEmail;
use App\Models\AssessmentRequest;
use App\Models\Order;
use App\Models\OrderDetial;
use App\Models\PromoCode;
use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use App\Models\UserPaymentInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    const TITLE = 'Checkout';
    const VIEW = 'parent/checkout';
    const URL = 'parent/checkouts';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'product',
        ]);
    }
    public function index()
    {
        $records = Cart::content();

        $user = auth()->user();
        $payment_informations = $user->userPaymentInformations;
        $latest_payment = UserPaymentInformation::where('user_id', $user->id)->where('flag', 1)->latest()->first();
        $students = Student::where('user_id', Auth::id())->get();
        $student_discount = [];
        $regular_discount = [];
        $student_ids = [];
        $annual_fee = 0;
        $ids = [];
        foreach ($records as $item) {
            if ($item->options?->student_id) {
                if ($ids != []) {
                    // $student;
                    foreach ($ids as $id) {
                        if ($id != $item->options?->student_id) {
                            $student = $students->where('id', $item->options?->student_id)->first();
                            if ($student->annual_fee == 'Pending') {
                                $annual_fee += 190;
                                $ids[] = $student->id;
                            } else {
                                if ($student->getFeeDate() >= 1) {
                                    $annual_fee += 190;
                                    $ids[] = $student->id;
                                }
                            }
                        }
                    }
                } else {
                    $student = $students->where('id', $item->options?->student_id)->first();
                    if ($student->annual_fee == 'Pending') {
                        $annual_fee += 190;
                        $ids[] = $student->id;
                    } else {
                        if ($student->getFeeDate() >= 1) {
                            $annual_fee += 190;
                            $ids[] = $student->id;
                        }
                    }
                }
                array_push($student_ids, $student?->id);
                array_push($student_discount, $student?->discount);
            }
        }
        $ids = $student_ids;

        foreach (array_count_values($ids) as $id) {
            $discount = 0;
            switch ($id) {
                case $id === 2:
                    $discount = 7.5;
                    break;
                case $id === 3:
                    $discount = 15;
                    break;
                case $id >= 4:
                    $discount = 25;
                    break;
                default:
                    $discount = 0;
                    break;
            }
            array_push($regular_discount, $discount);
        }


        $regular_discounts = collect($regular_discount)->flatten()->max();
        $sibling_discount = collect($student_discount)->flatten()->max();

        $discount_name = 'Discount Applied';
        $collection = array($regular_discounts, $sibling_discount);
        // dd($regular_discounts,$sibling_discount);

        $discount_apply = collect($collection)->flatten()->max();
        // dd($discount_apply);
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function thankYou()
    {
        return view(self::VIEW . '.thank_you');
    }
    public function promoCode(Request $request)
    {
        $code = PromoCode::where('code', $request->code)->first();
        // dd($code);
        if (!is_null($code)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Valid Promo Code',
                    'data' => $code->discount,
                ],
                200
            );
        }
        if (is_null($code)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Invalid Promo Code'
                ],
                200
            );
        }
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $request->validate([
            'user_payment_information_id' => 'nullable',
            'term_condition' => 'required',
        ]);
        $students = [];
        if ($request->students) {
            foreach ($request->students as $student) {
                $data = explode('.', $student);
                $students[] = ['index' => $data[1], 'user_id' => $data[0]];
            }
        }
        $code_discount = 0;
        if ($request->promo_code) {
            $code = PromoCode::where('code', $request->promo_code)->first();
            if (is_null($code)) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Invalid Promo Code'
                    ],
                    404
                );
            }
            $code_discount = $code?->discount;
        }
        if (isset($request->user_payment_information_id)) {
            $payment_information = UserPaymentInformation::find($request->user_payment_information_id);
            $paymentMethod = $payment_information->payment_method;
        }
        // dd($request->all());
        $user = auth()->user();
        $order = Order::create([
            'user_id' => Auth::id(),
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
        ]);
        $assessment_discount = 0;
        $student_discount = [];
        $regular_discount = [];
        $anuual_fee = 0;
        $credit = 0;
        $student_ids = [];
        $ids = [];
        $credit_ids = [];
        foreach (Cart::content() as $key => $cart) {
            $record = collect($students)->filter(function ($item) use ($cart) {
                if ($cart->rowId == $item['index']) {
                    return $item['user_id'];
                }
            });
            $student_id = $record->first();
            if ($student_id != []) {
                if ($ids != []) {
                    // $student;
                    foreach ($ids as $id) {
                        if ($id != $student_id['user_id']) {
                            $student = Student::where('id', $student_id['user_id'])->first();

                            $current_date = Carbon::now();
                            if ($student->annual_fee == 'Pending') {
                                $anuual_fee += 190;
                                $credit += $student->credit;
                                $student->update([
                                    'annual_fee' => 'Paid',
                                    'fee_paid_date' => $current_date->format('Y-m-d'),
                                ]);
                            } else {
                                if ($student->getFeeDate() >= 1) {
                                    $anuual_fee += 190;
                                    $student->update([
                                        'annual_fee' => 'Paid',
                                        'fee_paid_date' => $current_date->formt('Y-m-d'),
                                    ]);
                                }
                            }
                        }
                    }
                } else {
                    $student = Student::where('id', $student_id['user_id'])->first();
                    $current_date = Carbon::now();
                    if ($student->annual_fee == 'Pending') {
                        $anuual_fee += 190;
                        $credit += $student->credit;
                        $student->update([
                            'annual_fee' => 'Paid',
                            'fee_paid_date' => $current_date->format('Y-m-d'),
                        ]);
                    } else {
                        if ($student->getFeeDate() >= 1) {
                            $anuual_fee += 190;
                            $student->update([
                                'annual_fee' => 'Paid',
                                'fee_paid_date' => $current_date->formt('Y-m-d'),
                            ]);
                        }
                    }
                }
                if ($credit_ids != []) {
                    foreach ($credit_ids as $credit_id) {
                        if ($credit_id != $student_id['user_id']) {
                            $student = Student::where('id', $student_id['user_id'])->first();
                            $credit += $student->credit;
                        }
                    }
                } else {
                    $student = Student::where('id', $student_id['user_id'])->first();
                    $credit += $student->credit;
                    array_push($credit_ids, $student->id);
                }
                array_push($student_ids, $student->id);
                array_push($student_discount, $student?->discount);
            }
            $order_detail = OrderDetial::create([
                'order_id' => $order->id,
                'student_id' => null,
                'product_id' => $cart->options->type == 'product' ? $cart->id : null,
                'name' => $cart->name,
                'size' => $cart->options->size,
                'type' => $cart->options->type == 'product' ? $cart->options->type : null,
                'price' => $cart->price,
                'qty' => $cart->qty,
            ]);
            if ($cart->options->type != 'product') {
                StudentTerm::create([
                    'order_detial_id' => $order_detail->id,
                    'student_id' => $student_id != [] ? $student_id['user_id'] : null,
                    'term_id' => $cart->id,
                    'qty' => $cart->qty,
                    'day' => $cart->options->day,
                    'no_of_class' => $cart->options->no_of_class,
                    'type' => $cart->options->type,
                    'status' => 'on',
                ]);
            }
        }

        $ids = $student_ids;

        foreach (array_count_values($ids) as $id) {
            $discount = 0;
            switch ($id) {
                case $id === 2:
                    $discount = 7.5;
                    break;
                case $id === 3:
                    $discount = 15;
                    break;
                case $id >= 4:
                    $discount = 25;
                    break;
                default:
                    $discount = 0;
                    break;
            }
            array_push($regular_discount, $discount);
        }
        $sibling_discount = collect($student_discount)->flatten()->max();
        $regular_discounts = collect($regular_discount)->flatten()->max();
        $collection = array($sibling_discount, $code_discount, $regular_discounts);
        $discount_apply = collect($collection)->flatten()->max();

        // promo code discount
        $value = explode(',', Cart::subtotal());
        if (isset($value[1])) {
            $price = explode('.', $value[0] . $value[1]);
        } else {
            $price = explode('.', $value[0]);
        }
        // $price = explode('.', $value[0]);

        // dd($price);
        $discount = ($price[0] * $discount_apply) / 100;
        // end
        $discount_price = explode(',', $price[0] - $discount + $anuual_fee);
        $total_price = explode('.', $discount_price[0]);
        $tax_amount = ($total_price[0] * 5) / 100;
        $pay_total = explode('.', $total_price[0] + $tax_amount - $credit);
        $order->update([
            'discount' => $discount,
            'tax' => $tax_amount,
        ]);
        // $total_price_after_assesment = 0;
        // if ($assessment_discount != 0) {
        //     $discount_on_assessment = ($total_price[0] * $assessment_discount) / 100;
        //     $price_after_assesment = explode(',', $total_price[0] - $discount_on_assessment);
        //     $total_price_after_assesment = explode('.', $price_after_assesment[0]);
        // }
        // dd($total_price,$total_price_after_assesment,$total_price_after_assesment != 0 ? $total_price_after_assesment[0] : $total_price[0]);
        if (isset($paymentMethod)) {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($pay_total[0], $paymentMethod);
        }
        // $user->createOrGetStripeCustomer();
        // $user->updateDefaultPaymentMethod($paymentMethod);
        // $user->charge($pay_total[0], $paymentMethod);

        Cart::destroy();
        foreach ($order->orderDetail as $record_email) {
            foreach ($record_email->studentTerms->where('status', 'on') as $student_term) {
                try {
                    $booking_email = [
                        'email' => $user->email,
                        'student_name' => $student_term->student?->name,
                        'venue_name' => $student_term->venueName(),
                        'location' => $student_term->venueLocation(),
                        'date' => date('M d,Y', strtotime($student_term->getStartDate())) . ' to ' . date('M d,Y', strtotime($student_term->getEndDate())),
                    ];
                    // dd($student_term->term->toArray());
                    $payment_email = [
                        'email' => $user->email,
                        'name' => $user->first_name . ' ' . $user->last_name,
                        'student_name' => $student_term->student?->name,
                        'payment' => $record_email->price,
                        'trainer' => $student_term->trainerName(),
                        'payment_type' => $student_term->className() . ' - Speedo',
                        'location' => $student_term->venueLocation(),
                        'level' => $student_term->getSwimmingClassName() . ' , ' . $student_term->getTime() . ' , ' .
                            $student_term->getClassType() . ' ( ' . $student_term->getTermDays() . ' )',
                    ];
                    Mail::to($user->email)->send(new BookingConfirmationEmail($booking_email));
                    Mail::to($user->email)->send(new PaymentConfirmationEmail($payment_email));
                } catch (\Throwable $th) {
                    Log::error('Error Occured while sending email to user' . $th->getMessage());
                }
            }
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Payment Successful'
            ],
            200
        );
    }
}
