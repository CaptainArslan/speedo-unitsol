<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentRequest;
use App\Models\ClassPromotRequest;
use App\Models\Student;
use App\Models\StudentTerm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClassPromotRequestController extends Controller
{
    const TITLE = 'Class Promot Request';
    const VIEW = 'admin/class_promot_request';
    const URL = 'admin/class-promot-requests';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }

    public function index(Request $request){
        abort_if(Gate::denies('view_class_promot_request'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $class_promot_requests = ClassPromotRequest::latest()->get();
        return view(self::VIEW . '.index',get_defined_vars());
    }
    
    public function acceptRequest(Request $request,$id)
    {
        // dd($id);
        $class_promot_request = ClassPromotRequest::find($id);
        $assessment_request=AssessmentRequest::where('student_id',$class_promot_request->student_id)
        ->where('status', 'Enroll Now')->where('dismiss', false)->first();
        $student_term=StudentTerm::where('term_id',$class_promot_request->term_id)
        ->where('type',$class_promot_request->type)
        ->where('student_id',$class_promot_request->student_id)
        ->where('status', 'on')->first();
        if(!is_null($student_term)){
            $student_term->update([
                'status'=>'off'
            ]);
        }
        // dd($student_term);
        $now=Carbon::now();
        if($assessment_request){
            $assessment_request->update([
                'dismiss'=>true,
            ]);
            AssessmentRequest::create(['user_id' => $class_promot_request?->student->user_id,
                'student_id'=>$class_promot_request->student_id,
                'swimming_class_id'=>$class_promot_request->swimming_class_id,
                'discount'=>0,
                'till_date'=>$now->format('Y-m-d'),
                'status'=>'Enroll Now',
            ]);
            $class_promot_request->update(['status' => 'accepted'
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Class Promot Request Accepted'
                ],
                200
            );
        }else{
           
        return response()->json(
            [
                'success' => true,
                'message' => 'Class Promot Request Accepted'
            ],
            200
        );
    }

    }
}
