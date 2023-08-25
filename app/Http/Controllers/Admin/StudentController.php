<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    const TITLE = 'Student';
    const VIEW = 'admin/student';
    const URL = 'admin/students';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'student',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_student'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Student::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $student_name = "{$r->studentName()}";
                    $user=User::find(Auth::id());
                    if($user->can('detail_student')){
                        $name="<a href='$url/$r->id' class='toggle' data-target='editClass'><span>$student_name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$student_name</span></a>";

                    }
                    $show=$user->can('detail_student')?
                        "<li><a href='$url/$r->id' class='toggle' data-target='editClass'><em
                        class='icon ni ni-eye'></em><span>View</span></a>
                        </li>":"";
                         $edit=$user->can('edit_student')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $actions = '';
                    $actions .= "
                                <ul class='nk-tb-actions gx-1'>
                                <li>
                                    <div class='drodown'>
                                        <a href='#'
                                            class='dropdown-toggle btn btn-sm btn-icon btn-trigger'
                                            data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                        <div class='dropdown-menu dropdown-menu-right'>
                                            <ul class='link-list-opt no-bdr'>
                                            $show
                                            $edit
                                            </ul>
                                        </div> 
                                       
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'swim_code' => $r->swim_code,
                        'image' => $r->image,
                        'name' => $name,
                        'parent_name' => $r->user?->first_name . ' ' . $r->user?->last_name,
                        'contact_no' => $r->user?->contact_number,
                        'age' => $r->getAge(),
                        'dob' => $r->dob,
                        'gender' => $r->gender,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'customer', 'venue', 'price', 'status'])
                ->make(true);
        }
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function show($id)
    {
        abort_if(Gate::denies('detail_student'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $student = Student::find($id);
        $classes=SwimmingClass::all();
        $assesment_request = AssessmentRequest::where('student_id',$id)->first();
        $student_terms = StudentTerm::where('student_id', $id)->get();
        $class_sessions = ClassSession::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_gradings = ClassGrading::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
            $class_assessments = ClassAssessment::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))
        ->get();
        return view(self::VIEW . '.show', get_defined_vars());
    }
    public function changeAssessmentStatus(Request $request, $id)
    {
        $now=Carbon::now();
        $assesment_request = AssessmentRequest::where('student_id', $id)->first();
        if ($assesment_request != null) {
            $assesment_request->update([
                'status' => $request->status,
                'swimming_class_id' => null,
                'till_date' => null,
                'discount' => 0,
                'status_date' => $now,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Status Change ' . $request->status,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'No Assessment Request Found'
                ],
                200
            );
        }
    }
    public function edit($id)
    { 
        abort_if(Gate::denies('edit_student'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $student = Student::find($id);
        $customer = User::find($student->user_id);
        $countries=Country::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required',
            'school' => 'required',
            'medical_information' => 'required',
            'contact_no' => 'required|integer',
            'relation' => 'required',
            'dob' => 'required',
            'country_code' => 'required',
            'gender' => 'required',
        ]);
        $student = Student::find($id);
        $student->fill($request->all());
        $student->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    } 
    public function addStudentCredit(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'credit' => $request->credit ? $request->credit : 0,
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }
}
