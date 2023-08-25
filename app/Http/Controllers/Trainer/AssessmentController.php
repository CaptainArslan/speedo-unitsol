<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentRequest;
use App\Models\AssessmentStudent;
use App\Models\ClassAssessment;
use App\Models\ClassGrading;
use App\Models\ClassPromotRequest;
use App\Models\Grading;
use App\Models\StudentAssessmentDetail;
use App\Models\StudentTerm;
use App\Models\SwimmingClass;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    const TITLE = 'Assessment';
    const VIEW = 'trainer/assessment';
    const URL = 'trainer/assessments';


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
        $classes = TermBaseBooking::where('trainer_id', Auth::id())->get();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function create()
    {
        //
    }


    public function show(Request $request, $id)
    {
        $now = Carbon::now();
        $current_date = $now->format('Y-m-d');
        if ($request->q == 1) {
            $term=TermBaseBooking::find($id);
            $records = StudentTerm::where('term_id', $id)->where('type', 'term')->where('status', 'on')->get();
            
            $class_assessment= ClassAssessment::where('class_id', $id)->where('type', 'term')->where('date',$current_date)->first();
        } else {
            $term=TermBaseBookingPackage::find($id);
            $records = StudentTerm::where('term_id', $id)->where('type', 'package')->where('status', 'on')->get();
            $class_assessment = ClassAssessment::where('class_id', $id)->where('type', 'package')->where('date',$current_date)->first();
        }
        $assessments = Assessment::where('parent_id', '!=', 0)->get();
        $term_base_booking_classes = TermBaseBooking::where('parent_id', '!=', 0)->pluck('swimming_class_id');
        $swimming_classes = SwimmingClass::whereIn('id', $term_base_booking_classes)->get();
        return view(self::VIEW . '.show', get_defined_vars());
    }

    public function edit($id)
    {
        //
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
            'assessment' => 'required',
        ]);
        // dd($request);
        $now = Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_assessment = ClassAssessment::where('class_id', $id)
        ->where('type', $request->type)
        ->where('date', $request->date)->first();
        if (is_null($class_assessment)) {
            $record = ClassAssessment::create([
                'user_id' => Auth::id(),
                'class_id' => $id,
                'type' => $request->type,
                'date' => $current_date,
            ]);
        }
        $assessment_student = AssessmentStudent::create([
            'class_assessment_id' => $class_assessment != null ? $class_assessment->id : $record->id,
            'student_id' => $request->student_id,
            'message' => $request->message,
        ]);
        foreach ($request['assessment'] as $detail) {
            if (!is_null($detail['status'])) {
                $student_assessment_detail = StudentAssessmentDetail::create([
                    'assessment_student_id' => $assessment_student->id,
                    'assessment_id' => $detail['assessment_id'],
                    'status' => $detail['status'],
                ]);
            }
        }

        if ($request->ajax()) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Student Grading marked successfully!'
                ],
                200
            );
        }
    } 
    public function update(Request $request, $id)
    {
        $class_assessment = ClassAssessment::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $assessment_student = AssessmentStudent::where('class_assessment_id',$class_assessment?->id)
        ->where('student_id', $id)->first();
       if(!is_null($assessment_student)){
        $assessment_student->update([
            'message' => $request->message?$request->message:$assessment_student->message,
            ]);
       }

       
        if ($request['assessment']) {
            StudentAssessmentDetail::where('assessment_student_id',$assessment_student->id)->delete();
        }
        foreach ($request['assessment'] as $detail) {
            if (!is_null($detail['status'])) {
                $student_assessment_detail = StudentAssessmentDetail::create([
                    'assessment_student_id' => $assessment_student->id,
                    'assessment_id' => $detail['assessment_id'],
                    'status' => $detail['status'],
                ]);
            }
        }
        return back()->with('message', 'Student assessment update successfully!');
    }
    public function promotClass(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
        ]);
        ClassPromotRequest::create([
            'user_id' => Auth::id(),
            'term_id' => $request->term_id,
            'type' => $request->type,
            'student_id' => $request->student_id,
            'swimming_class_id' => $request->class_id,
            'status' => 'waiting',
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Class Promot Request Received'
            ],
            200
        );
    }
    public function destroy($id)
    {
        //
    }
}
