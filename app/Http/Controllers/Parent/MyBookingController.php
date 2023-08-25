<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use App\Models\Order;
use App\Models\OrderDetial;
use App\Models\Student;
use App\Models\StudentTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show($id)
    {
        $order_detail = OrderDetial::find($id);
        $student_terms = $order_detail->studentTerms;
        $student_term_active=$order_detail->studentTermsActive;
        // dd($student_terms->pluck('type'));
        $class_sessions=ClassSession::whereIn('class_id',$student_terms->pluck('term_id'))
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

    public function update(Request $request,$id)
    {
        $record=StudentTerm::find($id);
        $record->update([
            'student_id' => $request->student_id,
        ]);
        return redirect(self::URL)->with('success','Record Update Successfully');
        // return response()->json(
        //     [
        //         'success' => true,
        //         'message' => 'Record Update Successfully'
        //     ],
        //     200
        // );

    }

}
