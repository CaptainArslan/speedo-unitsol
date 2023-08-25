<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\ClassSession;
use App\Models\OrderDetial;
use App\Models\SessionAttendance;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    const TITLE = 'Attendance';
    const VIEW = 'trainer/attendance';
    const URL = 'trainer/attendances';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function index()
    {
        $classes = TermBaseBooking::where('trainer_id', Auth::id())->get();
        return view(self::VIEW . '.index',get_defined_vars());
    }
    
    public function show(Request $request,$id)
    {
        $now=Carbon::now();
        $current_date= $now->format('Y-m-d');
        // dd($current_date);
        if ($request->q == 1){
            $term=TermBaseBooking::find($id);
            $records=StudentTerm::where('term_id',$id)->where('type','term')->where('status','on')->get();
            $class_session = ClassSession::where('class_id', $id)->where('type', 'term')->whereDate('date', $current_date)->first();
        }else{
            $term = TermBaseBookingPackage::find($id);
            $records = StudentTerm::where('term_id', $id)->where('type', 'package')->where('status','on')->get();
            $class_session = ClassSession::where('class_id', $id)->where('type', 'package')->whereDate('date', $current_date)->first();
        }
        
        return view(self::VIEW . '.show',get_defined_vars());
    }
    
        
    public function sessionAttendance(Request $request, $id)
    {
        $now=Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_session = ClassSession::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $current_date)->first();
        if(is_null($class_session)){
            $record=ClassSession::create([
                'user_id'=>Auth::id(),
                'class_id'=>$request->class_id,
                'type'=>$request->class_type,
                'date'=>$request->date,
            ]);
        }

        SessionAttendance::create([
            'class_session_id' => $class_session != null ? $class_session->id : $record->id,
            'student_id' => $id,
            'status' => $request->status,
            'late' => $request->late ? $request->late : null,
        ]);
        if($request->ajax()){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Student attendance marked successfully!'
                ],
                200
            );
        }
        return back()->with('message', 'Student attendance marked successfully!');
       
        
    }

    public function changeAttendance(Request $request, $id)
    { 
        $class_session = ClassSession::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $attendance=SessionAttendance::where('class_session_id',$class_session?->id)->where('student_id',$id)->first();
        if(!is_null($attendance)){
            $attendance->update([
                'status'=>$request->status,
                'late'=>$request->late,
            ]);
            return back()->with('message', 'Student attendance update successfully!');
        }
    }
}
