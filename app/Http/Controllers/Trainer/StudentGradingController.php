<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\ClassGrading;
use App\Models\Grading;
use App\Models\OrderDetial;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGradingController extends Controller
{
    const TITLE = 'Student Grading';
    const VIEW = 'trainer/student_grading';
    const URL = 'trainer/student-gradings';


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
        return view(self::VIEW . '.index',get_defined_vars());
    }
    public function create()
    {
        //
    }
    public function show(Request $request,$id)
    {
        if ($request->q == 1){
            $term=TermBaseBooking::find($id);
            $records=StudentTerm::where('term_id',$id)->where('type','term')->where('status','on')->get();
            $class_grading = ClassGrading::where('class_id', $id)->where('type', 'term')->first();
        }else{
            $term=TermBaseBookingPackage::find($id);
            $records = StudentTerm::where('term_id', $id)->where('type', 'package')->where('status','on')->get();
            $class_grading= ClassGrading::where('class_id', $id)->where('type', 'package')->first();
        }
        
        return view(self::VIEW . '.show',get_defined_vars());
    }

    public function edit($id)
    {
        //
    }

    
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'remarks'=>'required',
            'grade'=>'required',
        ]);
        $now=Carbon::now();
        $current_date = $now->format('Y-m-d');
        $class_grading = ClassGrading::where('class_id', $id)
        ->where('type', $request->type)->first();
        if(is_null($class_grading)){
            $record=ClassGrading::create([
                'user_id'=>Auth::id(),
                'class_id'=>$id,
                'type'=>$request->type,
                'date'=>$current_date,
            ]);
        }

        Grading::create([
            'class_grading_id' => $class_grading != null ? $class_grading->id : $record->id,
            'student_id' => $request->student_id,
            'status' => $request->grade,
            'remarks' => $request->remarks,
        ]);
        if($request->ajax()){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Student Grading marked successfully!'
                ],
                200
            );
        }
        return back()->with('message', 'Student Grading marked successfully!');
    } 
    public function update(Request $request, $id)
    {
        $now=Carbon::now();
        $class_grading = ClassGrading::where('class_id', $request->class_id)
        ->where('type', $request->class_type)->whereDate('date', $request->date)->first();
        $grading=Grading::where('class_grading_id',$class_grading?->id)->where('student_id',$id)->first();
        if(!is_null($grading)){
            $grading->update([
                'status' => $request->grade?$request->grade:$grading->status,
            'remarks' => $request->remarks,
            ]);
            return back()->with('message', 'Student attendance update successfully!');
        }
      
    }
}
