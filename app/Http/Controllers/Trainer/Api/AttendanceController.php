<?php

namespace App\Http\Controllers\Trainer\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SessionStudentListCollection;
use App\Models\AssessmentRequest;
use App\Models\ClassAssessment;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use App\Models\SessionAttendance;
use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainerApi;
class AttendanceController extends Controller
{
    
    public function getSwimmingSessions(Request $request)
    {
        $records = (new TrainerApi)->swimmingSessions($request);
        return [
            'status' => true,
            'message' => 'Record Found',
            'data' => $records,
        ];      
    }
    public function getSessionByDate(Request $request)
    {
        $records=(new TrainerApi)->sessionByDate($request);
        return [
            'status' => true,
            'message' => 'Record Found',
            'data' => $records,
        ];      
    }
    public function sessionStudentLists(Request $request)
    {
        if ($request->type == 'term'){
            $records=StudentTerm::where('term_id',$request->term_id)->where('type',$request->type)->where('status','on')->get();
        }else{
            $records = StudentTerm::where('term_id',$request->term_id)->where('type',$request->type)->where('status','on')->get();
        }
        return new SessionStudentListCollection(
            $records
        );
    }
    public function getStudentProfile(Request $request)
    {
        $records = (new TrainerApi)->studentProfile($request);
        return [
            'status' => true,
            'message' => 'Record Found',
            'data' => $records,
        ]; 
    }
    public function markAttandance(Request $request)
    {
        $now=Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_session = ClassSession::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $current_date)->first();
        if(is_null($class_session)){
            $record=ClassSession::create([
                'user_id'=>$request->user_id,
                'class_id'=>$request->class_id,
                'type'=>$request->class_type,
                'date' => $current_date,
            ]);
        }
        SessionAttendance::create([
            'class_session_id' => $class_session != null ? $class_session->id : $record->id,
            'student_id' => $request->student_id,
            'status' => $request->status,
            'late' => $request->reason ? $request->reason : null,
        ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Student attendance marked successfully!'
                ],
                200
            );
    }
    public function updateAttandance(Request $request)
    { 
        $class_session = ClassSession::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $attendance = SessionAttendance::where('class_session_id', $class_session?->id)
        ->where('student_id', $request->student_id)->first();
        if(!is_null($attendance)){
            $attendance->update([
                'status'=>$request->status,
                'late'=>$request->reason,
            ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Student attendance update successfully!'
                ],
                200
            );
        }
    }
}
