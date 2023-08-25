<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ClassAssignEmail;
use App\Models\Assessment;
use App\Models\AssessmentRequest;
use App\Models\SwimmingClass;
use App\Models\TermBaseBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class AssessmentRequestController extends Controller
{
    const TITLE = 'Assessment';
    const VIEW = 'admin/assessment_request';
    const URL = 'admin/assessment-requests';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'class',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_assesment_request'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = AssessmentRequest::where('dismiss', false)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $student_name = $r->student?->name;
                    $student_url = url('admin/students/' . $r->student?->id);
                    $swimer_code = $r->student?->swim_code;
                    $user = User::find(Auth::id());
                    $swim_code = $user->can('detail_student') ? "<a href='$student_url' class='toggle' data-target='editClass'><span>$swimer_code</span></a>"
                        : "$swimer_code";
                    $delete = $user->can('delete_assesment_request') ? " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
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
                                               $delete
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'swim_code' => $swim_code,
                        'parent_name' => $r->parent?->first_name . ' ' . $r->parent?->last_name,
                        'name' => $r->getClassAndName(),
                        'relation' => $r->student?->relation,
                        'dob' => date('M m,Y', strtotime($r->student?->dob)),
                        'contact_number' => $r->getParentEmail(),
                        // 'discount' => $r->discount,
                        'status' => $r->getStatusList(),
                        'status_date_change' => date('M m,Y', strtotime($r->status_date)),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'swim_code', 'status', 'contact_number'])
                ->make(true);
        }
        $records = AssessmentRequest::where('dismiss', false)->count();
        $classes = SwimmingClass::all();
        return view(self::VIEW . '.index', get_defined_vars());
    }





    public function store(Request $request, $id)
    {
        AssessmentRequest::create([
            'user_id' => Auth::id(),
            'student_id' => $id,
            'status' => 'Waiting',
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Your Free Assessment Request Recieved'
            ],
            200
        );
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        abort_if(Gate::denies('edit_assesment_request'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $assesment_request = AssessmentRequest::findOrFail($id);
        $classes = SwimmingClass::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            // 'discount'=>'required',
            // 'till_date'=>'required',
        ]);
        $assesment_request = AssessmentRequest::find($id);
        $user = $assesment_request->parent;
        $assesment_request->update([
            'swimming_class_id' => $request->class_id,
            'discount' => $request->discount != 0 ? $request->discount : 0,
            'till_date' =>  $request->till_date,
            'status' => "Enroll Now",
            'is_approved' => true,
        ]);
        $class = SwimmingClass::find($request->class_id);
        $record = [
            'email' => $user->email,
            'class' => $class?->name,
        ];
        Mail::to($user->email)->send(new ClassAssignEmail($record));
        return response()->json(
            [
                'success' => true,
                'message' => 'Status Change ' . $request->status,
            ],
            200
        );
    }
}
