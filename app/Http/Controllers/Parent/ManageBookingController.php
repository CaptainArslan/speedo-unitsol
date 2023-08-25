<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\AssessmentRequest;
use App\Models\ClassType;
use App\Models\Day;
use App\Models\Order;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\SwimmingClass;
use App\Models\Term;
use App\Models\TermBaseBooking;
use App\Models\Timing;
use App\Models\Venue;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class ManageBookingController extends Controller
{
    const TITLE = 'Manage Booking';
    const VIEW = 'parent/manage_booking';
    const URL = 'parent/manage-bookings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'product',
            'student_image_url' => env('APP_IMAGE_URL') . 'student',
            'venue_image_url' => env('APP_IMAGE_URL') . 'venue',
        ]);
    }
    public function index(Request $request)
    {
        $carts = Cart::content();
        $now = Carbon::now();
        $current_date = $now->format('M d Y');
        $days = Day::all();
        $timings = Timing::all();
        $venues = Venue::all();
        $class_types = ClassType::all();
        $students = Student::where('user_id', Auth::id())->get();
        $student_id = [];
        $student_id = $request->student_id ? $request->student_id : [];
        $classes = SwimmingClass::all();

        $terms = TermBaseBooking::where('parent_id', 0)->where('is_approved', true)
            // ->byTerm($request->term)
            ->where('term_id',$request->term)
            ->latest()->get()->groupBy('term_id');
        // dd($terms);
        $products = Product::all();
        $venue_id = $request->location ? $request->location : null;
        $term_id = $request->term ? $request->term : null;
        // $filter_terms = TermBaseBooking::where('parent_id', 0)->where('is_approved', true)->latest()->get();
        $filter_terms = Term::latest()->get();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function shops(Request $request)
    {
        $products = Product::all();
        return view('parent.shop.index', get_defined_vars());
    }
    public function productDetail($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        return view('parent.shop.show', get_defined_vars());
    }
    public function filterTerm(Request $request)
    {
        $student_id = [];
        $now = Carbon::now();
        $current_date = $now->format('M d Y');
        $student_id = $request->student_id ? $request->student_id : [];
        $carts = Cart::content();
        $assessment_requests = AssessmentRequest::whereIn('student_id', $student_id)
            ->where('status', 'Enroll Now')->where('dismiss', 0)->get();
        $venue_id = $request->venue_id ? $request->venue_id : null;
        $term_id = $request->term ? $request->term : null;
        $class_types = ClassType::all();
        $term_data = TermBaseBooking::byDays2($request->day_id)
            // ->byTerm($request->term_id)
            ->where('term_id',$request->term_id)
            ->byClassType($request->class_type_id)
            ->byClass($request->swimming_class_id)
            ->where('parent_id', 0)
            ->where('is_approved', true)->latest()->get();
        if ($student_id != []) {
            $parent_records = $term_data->whereIn('swimming_class_id', $assessment_requests->pluck('swimming_class_id'));
        } else {
            $parent_records = !is_null($venue_id)   ? $term_data : [];
        }
        $group_records = $parent_records ? $parent_records->groupBy('term_id') : [];
        $days_id = $request->day_id;
        return view(self::VIEW . '.partial.filter_term', get_defined_vars());
    }
    public function searchProduct(Request $request)
    {
        $records = Product::byName($request->name)->get();
        return view('parent.shop.partial.filter', get_defined_vars());
    }
    public function myPrivilege(Request $request)
    {

        return view('parent.my_privilege', get_defined_vars());
    }
}
