<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentRequest;
use App\Models\ClassAssessment;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use App\Models\Country;
use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\SwimmingClass;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    const TITLE = 'Student';
    const VIEW = 'parent/student';
    const URL = 'parent/students';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'student',
        ]);
    }
    public function index()
    {
        $students = Student::where('user_id', Auth::id())->get();
        $record = $students->take(1);
        // dd($record);
        if (!$record->isEmpty()) {
            $student_terms = StudentTerm::where('student_id', $record->pluck('id'))->where('status', 'on')->get();
            $class_sessions = ClassSession::whereIn('class_id', $student_terms->pluck('term_id'))
                ->whereIn('type', $student_terms->pluck('type'))
                ->get();
            $class_gradings = ClassGrading::whereIn('class_id', $student_terms->pluck('term_id'))
                ->whereIn('type', $student_terms->pluck('type'))
                ->get();
            $class_assessments = ClassAssessment::whereIn('class_id', $student_terms->pluck('term_id'))
                ->whereIn('type', $student_terms->pluck('type'))
                ->get();
        }

        $user = auth()->user();
        $total = count($students);
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function studentDetail($id)
    {
        $student = Student::find($id);
        $student_terms = StudentTerm::where('student_id', $id)->where('status', 'on')->get();
        $class_sessions = ClassSession::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_gradings = ClassGrading::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_assessments = ClassAssessment::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))
            ->get();
        return view(self::VIEW . '.partial.detail', get_defined_vars());
    }
    public function create()
    {
        $user = auth()->user();
        return view(self::VIEW . '.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            // 'school' => 'required',
            // 'medical_information' => 'required',
            'contact_no' => 'required|integer',
            // 'relation' => 'required',
            // 'image' => 'required',
            'location_id' => 'required',
            'level_id' => 'required',
            'term_condition' => 'required',
            'dob' => 'required',
        ]);
        if (!isset($request->register_as_student_id)) {
            $request->validate([
                'country_code' => 'required',
                'gender' => 'required',
            ]);
        }
        // dd(1);
        $user = Auth::user();
        $code = random_int(100000, 999999);
        $image = $request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/student', $name);
            $image_name = $name;
        }
        $student_records = Student::where('user_id', Auth::id())->get();
        $total_students = count($student_records);
        $sibling_discount = 0;
        if ($total_students == 0) {
            $sibling_discount = 0;
        } elseif ($total_students == 1) {
            $sibling_discount = 10;
        } elseif ($total_students == 2) {
            $sibling_discount = 20;
        } else {
            $sibling_discount = 30;
        }
        $now = Carbon::now();
        $student = new Student();
        $student->fill($request->all());
        $student->user_id = Auth::id();
        $student->medical_information = $request->medical_information;
        $student->term_condition = true;
        $student->name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->venue_id = $request->location_id;
        $student->swim_code = 'Swim' . $code;
        $student->discount = $sibling_discount;
        $student->gender = $request->gender ? $request->gender : $user->gender;
        $student->country_code = $request->country_code ? $request->country_code : $user->country_code;
        $student->register_as_student_id = $request->register_as_student_id ? Auth::id() : 0;
        $student->image = $image_name;
        $student->save();
        if ($request->level_id != 'need') {
            AssessmentRequest::create([
                'user_id' => Auth::id(),
                'student_id' => $student->id,
                'swimming_class_id' => $request->level_id,
                'status' => 'Enroll Now',
                'status_date' => $now,
            ]);
        } else {
            AssessmentRequest::create([
                'user_id' => Auth::id(),
                'student_id' => $student->id,
                'status' => 'Active',
                'status_date' => $now,
            ]);
        }


        if ($request->q) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'next',
                    'url' => url('parent/students?q=next')
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'You have register student successfully and someone from our team will get back to you soon
                    to schedule a free assessment.'
                ],
                200
            );
        }
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


    public function edit($id)
    {
        $student = Student::find($id);
        $countries = Country::all();
        $venues = Venue::all();
        $classes = SwimmingClass::all();
        $bookings = StudentTerm::where('student_id', $student->id)->get();
        // dd(!$bookings->isEmpty());
        $assessment = AssessmentRequest::where('student_id', $student->id)->first();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            // 'school' => 'required',
            // 'medical_information' => 'required',
            'contact_no' => 'required|integer',
            // 'relation' => 'required',
            'dob' => 'required',
            'country_code' => 'required',
            'gender' => 'required',
            // 'venue_id' =>   'required',
        ]);
        $image = $request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/student', $name);
            $image_name = $name;
        }
        $now = Carbon::now();
        $student = Student::find($id);
        $student->fill($request->all());
        $student->name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->medical_information = $request->medical_information;
        $student->image = $image_name;
        $student->venue_id = $request->location_id;
        $student->save();
        $assessment = AssessmentRequest::where('student_id', $student->id)->first();
        if ($assessment && $request->level_id) {
            if ($request->level_id != 'need') {
                $assessment->update([
                    'swimming_class_id' => $request->level_id,
                    'status' => 'Enroll Now',
                    'status_date' => $now,
                ]);
            } else {
                $assessment->update([
                    'swimming_class_id' => null,
                    'status' => 'Active',
                    'status_date' => $now,
                ]);
                AssessmentRequest::create([
                    'user_id' => Auth::id(),
                    'student_id' => $student->id,
                    'status' => 'Active',
                    'status_date' => $now,
                ]);
            }
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
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
}
