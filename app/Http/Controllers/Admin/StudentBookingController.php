<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\Term;
use App\Models\Venue;
use App\Models\Student;
use App\Models\ClassType;
use Illuminate\Http\Request;
use App\Models\TermBaseBooking;
use App\Models\AssessmentRequest;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Psy\Command\WhereamiCommand;
use Yajra\DataTables\DataTables;

class StudentBookingController extends Controller
{

    const TITLE = 'Staff Management';
    const VIEW = 'admin/student_booking';
    const URL = 'admin/student-booking';

    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $parent_id)
    {
        Cart::destroy();
        $venues = Venue::all();
        $class_types = ClassType::all();
        $filter_terms = Term::latest()->get();
        $days = Day::all();
        $students = Student::where('user_id', $parent_id)->get();
        return view(self::VIEW . '/index', get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            ->where('term_id', $request->term_id)
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
}
