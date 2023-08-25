<?php

namespace App\Http\Controllers\Trainer\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradingStudentListCollection;
use App\Models\ClassGrading;
use App\Models\Grading;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use App\Services\TrainerApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGradingController extends Controller
{
    public function getGradingSessions(Request $request)
    {
        $records=(new TrainerApi)->gradingSessions($request);
        return [
            'status' => true,
            'message' => 'Record Found',
            'data' => $records,
        ];      
    }
    public function gradingStudentLists(Request $request)
    {
        if ($request->type == 'term'){
            $records=StudentTerm::where('term_id',$request->term_id)->where('type',$request->type)->where('status','on')->get();
        }else{
            $records = StudentTerm::where('term_id',$request->term_id)->where('type',$request->type)->where('status','on')->get();
        }
        return new GradingStudentListCollection(
            $records
        );
    }
    public function markGrading(Request $request)
    {
        // dd($request);
        $request->validate([
            'remarks'=>'required',
            'status'=>'required',
        ]);
        $now=Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_grading = ClassGrading::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->first();
        if(is_null($class_grading)){
            $record=ClassGrading::create([
                'user_id'=>$request->user_id,
                'class_id'=>$request->class_id,
                'type'=>$request->class_type,
                'date'=>$current_date,
            ]);
        }

        Grading::create([
            'class_grading_id' => $class_grading != null ? $class_grading->id : $record->id,
            'student_id' => $request->student_id,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Student Grading marked successfully!'
                ],
                200
            );
    }
    public function updateStudentGrading(Request $request)
    { 
        $class_grading =ClassGrading::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $grading=Grading::where('class_grading_id',$class_grading?->id)->where('student_id',$request->student_id)->first();
        if(!is_null($grading)){
            $grading->update(['status' => $request->status,
                'remarks' => $request->remarks,
            ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Student grading update successfully!'
                ],
                200
            );
        }else{
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Record Not Found',
                ],
                200
            );
        }
    }
}
