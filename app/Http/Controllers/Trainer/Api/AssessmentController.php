<?php

namespace App\Http\Controllers\Trainer\Api;

use Carbon\Carbon;
use App\Models\Grading;
use App\Models\Assessment;
use App\Models\StudentTerm;
use App\Models\ClassGrading;
use App\Services\TrainerApi;
use Illuminate\Http\Request;
use App\Models\ClassAssessment;
use App\Models\TermBaseBooking;
use App\Models\AssessmentStudent;
use App\Models\ClassPromotRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TermBaseBookingPackage;
use App\Models\StudentAssessmentDetail;
use App\Http\Resources\AssessmentListCollection;
use App\Http\Resources\GradingStudentListCollection;
use App\Http\Resources\AssessmentStudentListCollection;

class AssessmentController extends Controller
{
    public function getAssessmentSessions(Request $request)
    {
        $records = (new TrainerApi)->assessmentSessions($request);
        return [
            'status' => true,
            'message' => 'Record Found',
            'data' => $records,
        ];
    }

    public function getAssessmentList(Request $request)
    {

        if ($request->class_type == 'term') {
            $record = TermBaseBooking::where('id', $request->class_id)->first();
            $swimming_class_id = $record ? $record->class->id : '';
        } else {
            $record = TermBaseBookingPackage::where('id', $request->class_id)->first();
            $swimming_class_id = $record?->term ? $record->term?->class->id : '';
        }

        return new AssessmentListCollection(
            Assessment::where('parent_id', '!=', 0)->where('swimming_class_id', $swimming_class_id)->get(),
        );
    }
    public function assessmentStudentLists(Request $request)
    {
        if ($request->type == 'term') {
            $records = StudentTerm::where('term_id', $request->term_id)->where('type', $request->type)->where('status', 'on')->get();
        } else {
            $records = StudentTerm::where('term_id', $request->term_id)->where('type', $request->type)->where('status', 'on')->get();
        }
        return new AssessmentStudentListCollection(
            $records
        );
    }

    public function markAssessment(Request $request)
    {
        // dd( );
        $request->validate([
            'message' => 'required',
            'assessment' => 'required',
        ]);
        $now = Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_assessment = ClassAssessment::where('class_id', $request->class_id)
            ->where('type', $request->class_type)->first();
        if (is_null($class_assessment)) {
            $record = ClassAssessment::create([
                'user_id' => $request->user_id,
                'class_id' => $request->class_id,
                'type' => $request->class_type,
                'date' => $current_date,
            ]);
        }
        $t = json_decode($request['assessment']);


        $assessment_student = AssessmentStudent::create([
            'class_assessment_id' => $class_assessment != null ? $class_assessment->id : $record->id,
            'student_id' => $request->student_id,
            'message' => $request->message,
        ]);
        foreach ($t as $detail) {
            if (!is_null($detail->status)) {
                $student_assessment_detail = StudentAssessmentDetail::create([
                    'assessment_student_id' => $assessment_student->id,
                    'assessment_id' => $detail->assessment_id,
                    'status' => $detail->status,
                ]);
            }
        }
        return response()->json(
            [
                'status' => true,
                'message' => 'Student Assessment marked successfully!'
            ],
            200
        );
    }
    public function updateAssessment(Request $request)
    {
        $class_assessment = ClassAssessment::where('class_id', $request->class_id)
            ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $assessment_student = AssessmentStudent::where('class_assessment_id', $class_assessment?->id)
            ->where('student_id', $request->student_id)->first();
        if (!is_null($assessment_student)) {
            $assessment_student->update([
                'message' => $request->message ? $request->message : $assessment_student->message,
            ]);
        }
        $t = json_decode($request['assessment']);
        if ($request['assessment']) {
            StudentAssessmentDetail::where('assessment_student_id', $assessment_student->id)->delete();
        }
        foreach ($t as $detail) {
            if (!is_null($detail->status)) {
                $student_assessment_detail = StudentAssessmentDetail::create([
                    'assessment_student_id' => $assessment_student->id,
                    'assessment_id' => $detail->assessment_id,
                    'status' => $detail->status,
                ]);
            }
        }
        return response()->json(
            [
                'status' => true,
                'message' => 'Student grading update successfully!'
            ],
            200
        );
    }

    public function promoteStudent(Request $request)
    {

        $promoteRequest = ClassPromotRequest::where('student_id', $request->student_id)->first();

        if ($promoteRequest == null) {
            $request->validate([
                'class_id' => 'required',
            ]);
            ClassPromotRequest::create([
                'user_id' => $request->user_id,
                'term_id' => $request->term_id,
                'type' => $request->type,
                'student_id' => $request->student_id,
                'swimming_class_id' => $request->class_id,
                'status' => 'waiting',
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Class Promote Request Received'
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Class Promotion Request Already in submitted. Please contact Speedo Admin'
                ],
                200
            );
        }
    }
}
