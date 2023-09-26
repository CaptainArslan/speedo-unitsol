<?php

namespace App\Http\Controllers\Parent;

use App\Models\Order;
use App\Models\Student;
use App\Models\OrderDetial;
use App\Models\StudentTerm;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerOrderBalance;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPaymentInformation;

class MyBookingController extends Controller
{
    const TITLE = 'My Booking';
    const VIEW = 'parent/my_booking';
    const URL = 'parent/my-bookings';


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
        $students = Student::where('user_id', Auth::id())->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function orderDetail($id)
    {
        $students = Student::where('user_id', Auth::id())->get();
        $order = Order::find($id);
        $order_details = OrderDetial::where('order_id', $id)->get();
        return view(self::VIEW . '.order_detail', get_defined_vars());
    }

    public function orderPayment(Order $order)
    {
        $user = auth()->user();
        $payment_informations = $user->userPaymentInformations;
        $latest_payment = UserPaymentInformation::where('user_id', $user->id)->where('flag', 1)->latest()->first();
        $students = Student::where('user_id', Auth::id())->get();
        $order_details = OrderDetial::where('order_id', $order->id)->get();
        return view(self::VIEW . '.order_payment', get_defined_vars());
    }

    public function show($id)
    {
        $order_detail = OrderDetial::find($id);
        $student_terms = $order_detail->studentTerms;
        $student_term_active = $order_detail->studentTermsActive;
        // dd($student_terms->pluck('type'));
        $class_sessions = ClassSession::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_gradings = ClassGrading::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $student = $student_term_active?->student;
        return view(self::VIEW . '.show', get_defined_vars());
    }
    public function invoice($id)
    {
        return view(self::VIEW . '.invoice', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $record = StudentTerm::find($id);
        $record->update([
            'student_id' => $request->student_id,
        ]);
        return redirect(self::URL)->with('success', 'Record Update Successfully');
        // return response()->json(
        //     [
        //         'success' => true,
        //         'message' => 'Record Update Successfully'
        //     ],
        //     200
        // );

    }

    public function updateBookingPayment(Request $request, Order $order)
    {
        // Get the last balance from the order's CustomerOrderBalance
        $lastBalance = $order->CustomerOrderBalance->last()->balance;

        // Validation rules and custom error messages
        $validationRules = [
            'payment_amount' => [
                'required',
                'numeric',
                'max:' . $lastBalance,
                'gt:0', // Custom rule: Payment amount must be greater than 0
            ],
            'term_condition' => 'required'
        ];

        $validationMessages = [
            'payment_amount.required' => 'Payment amount is required.',
            'payment_amount.numeric' => 'Payment amount must be a numeric value.',
            'payment_amount.max' => 'Payment amount should be less than or equal to the balance amount of AED ' . number_format($lastBalance, 2),
            'payment_amount.gt' => 'Payment amount must be greater than 0.',
        ];

        // Validate the request data
        $request->validate($validationRules, $validationMessages);

        if (isset($request->user_payment_information_id)) {
            $payment_information = UserPaymentInformation::find($request->user_payment_information_id);
            $paymentMethod = $payment_information->payment_method;
        }
        $user = Auth::user();

        $balanceData = [
            'user_id' => $user->id,
            'order_id' => $order->id,
            'balance' => $lastBalance - ($request->payment_amount ?? 0),
            'received_amount' => $request->payment_amount ?? 0,
            'payment_type' => null,
        ];

        if (isset($paymentMethod)) {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($request->payment_amount, $paymentMethod);
            $balanceData['payment_type'] = 'stripe';
        }

        $lastbalance = CustomerOrderBalance::create($balanceData);

        // Update the payment_status if the balance is now zero
        if ($lastbalance->balance == 0) {
            $order->update([
                'payment_status' => 'paid',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Payment updated successfully.',
        ], 200);
    }
}
