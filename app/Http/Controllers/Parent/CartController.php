<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Mail\IncompeteCheckoutEmail;
use App\Models\Package;
use App\Models\Product;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function addToCartTerm(Request $request, $id)
    {
        $carts = Cart::content();
        $record = explode('-', $id);
        // dd($record);
        $term_id = $record[0];
        $student_id = $record[1];
        $day = $record[2];
        $check = false;
        foreach ($carts as $cart) {
            if ($cart->id == $term_id && $cart->options->student_id == $student_id && $cart->options->type == 'term') {
                $check = true;
            }
        }
        $term = TermBaseBooking::find($term_id);
        $days = collect($term->countDays($term->start_date));
        $total_term_price = $term->getTotal($days);
        $no_of_class = $term->getNumberOfClass($days);

        $class_type = $term->classType;
        $price = $term->class->price  * $term->no_of_class;
        $discount = ($price * $term->discount) / 100;
        if ($check != true) {
            $cart = Cart::Add([
                'id' => $term_id,
                'name' => $term->name,
                'qty' => 1,
                'weight' => 0,
                'price' => $total_term_price,
                'options' => [
                    'type' => 'term',
                    'class_type' => $class_type?->class_occurrence,
                    'student_id' => $student_id,
                    'discount' => $term->discount,
                    'day' => $day,
                    'start_date' => date('M d,Y', strtotime($term->start_date)),
                    'end_date' => date('M d,Y', strtotime($term->end_date)),
                    'no_of_class' => $no_of_class,
                    'price' => $term->class->price,
                    'time' => $term->timing->getName(),
                    'time_total' => $term->getTimeDifferenceAttribute(),
                ]

            ]);
            // return response()->json(
            //     [
            //         'status' => true,
            // 'count' => Cart::count(),
            //         'message' => 'Cart Add Successfully'
            //     ],
            //     200
            // );
            $carts = Cart::content();
            $count = Cart::count();
            return view('parent.manage_booking.partial.cart_detail', get_defined_vars());
        } else {
            return response()->json(
                [
                    'status' => false,
                    'count' => Cart::count(),
                    'message' => 'Already Add In Cart'
                ],
                200
            );
        }
    }
    public function addToCartPackage(Request $request, $id)
    {
        $record = explode('-', $id);
        $package_id = $record[0];
        $term_id = $record[1];
        $student_id = $record[2];
        $carts = Cart::content();
        $check = false;
        foreach ($carts as $cart) {
            if ($cart->id == $package_id && $cart->options->student_id == $student_id && $cart->options->type == 'package') {
                $check = true;
            }
        }
        // dd($check);
        if ($check != true) {
            $package = TermBaseBookingPackage::find($package_id);
            $term = TermBaseBooking::find($term_id);
            $class_type = $term->classType;
            $cart = Cart::Add([
                'id' => $package_id,
                'name' => $package->name ? $package->name : "No name",
                'qty' => 1,
                'weight' => 0,
                'price' => $package->total,
                'options' => [
                    'start_date' => date('M d,Y', strtotime($package->start_date)),
                    'end_date' => date('M d,Y', strtotime($package->end_date)),
                    'type' => 'package',
                    'class_type' => $class_type?->class_occurrence,
                    'student_id' => $student_id,
                    'no_of_class' => $package->no_of_class,
                    'price' => $package->price,
                    'time' => $term->timing->name . ' ' . date('h:i A', strtotime($term->timing->start_time)),
                    'time_total' => $term->getTimeDifferenceAttribute(),
                ]

            ]);
            $carts = Cart::content();
            $count = Cart::count();
            return view('parent.manage_booking.partial.cart_detail', get_defined_vars());
        } else {
            return response()->json(
                [
                    'status' => false,
                    'count' => Cart::count(),
                    'message' => 'Already Add In Cart'
                ],
                200
            );
        }
    }
    public function addToCartProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = Cart::Add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'weight' => 0,
            'price' => $product->sale_price,
            'options' => [
                'type' => 'product',
                'size' => $request->size,
                'stock' => $product->stock,
                'image' => $product->getFirstImage(),
            ]

        ]);
        $carts = Cart::content();
        $count = Cart::count();
        return view('parent.manage_booking.partial.cart_detail', get_defined_vars());
    }
    public function updateQty(Request $request)
    {
        $rowId = $request->CartId;
        Cart::update(
            $rowId,
            [
                'qty' => $request->qty,
            ]
        );
        return response()->json(
            [
                'success' => true,
                'count' => Cart::count(),
                'cart' => Cart::content(),
                'message' => 'Quantity Update Successfully'
            ],
            200
        );
    }
    public function destroy($id)
    {
        $rowId = explode(',', $id);
        Cart::remove($rowId[1]);
        $carts = Cart::content();
        $count = Cart::count();
        return view('parent.manage_booking.partial.cart_detail', get_defined_vars());
    }
    public function emptyCart()
    {
        $user = auth()->user();
        Cart::destroy();
        Mail::to($user->email)->send(new IncompeteCheckoutEmail($user));
        return response()->json(
            [
                'success' => true,
                'url' => url('parent/manage-bookings'),
                'message' => 'Cart Empty Successfully'
            ],
            200
        );
    }
}
