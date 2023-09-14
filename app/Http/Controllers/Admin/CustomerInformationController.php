<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\User;
use App\Models\Country;
use App\Models\Emirate;
use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ClassAssessment;
use Yajra\DataTables\DataTables;
use App\Models\AssessmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CustomerInformationController extends Controller
{
    const TITLE = 'Customer';
    const VIEW = 'admin/customer_information';
    const URL = 'admin/customer-informations';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = User::whereRole('Parent')->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $data = "{$r->getName()}";
                    $user = User::find(Auth::id());
                    if ($user->can('edit_class')) {
                        $name = "<a href='$url/$r->id' class='toggle' data-target='editClass'><span>$data</span></a>";
                    } else {
                        $name = "<a href='#' class='toggle' data-target='editClass'><span>$data</span></a>";
                    }
                    $show = $user->can('show_customer') ?
                        "<li><a href='$url/$r->id' class='toggle' data-target='editClass'><em
                        class='icon ni ni-eye'></em><span>View</span></a>
                        </li>" : "";
                    $edit = $user->can('edit_customer') ?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>" : "";
                    $delete = $user->can('delete_customer') ? " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
                    $actions = '';
                    $status = "{$r->getStatus()}";
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
                                                   $delete
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'email' => $r->email,
                        'kids' => $r->getkid(),
                        'contact_number' => $r->contact_number,
                        'status' => $status,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'status', 'kids'])
                ->make(true);
        }
        $records = User::whereRole('Parent')->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function create(Request $request)
    {
        // abort_if(Gate::denies('view_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $user = auth()->user();
        $countries = Country::all();
        $emirates = Emirate::all();
        $areas = Area::where('emirate_id', $user->emirate_id)->get();
        return view(self::VIEW . '.create', get_defined_vars());
    }

    public function getArea(Request $request)
    {
        $user = auth()->user();
        $records = Area::where('emirate_id', $request->emirate_id)->get();
        return view(self::VIEW . '.partial.area', get_defined_vars());
    }

    public function store(Request $request)
    {
        // abort_if(Gate::denies('add_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $request->validate([
            'email' => ['unique:users,email,'],
            'contact_number' => 'required|integer',
            'first_name' => 'required',
            // 'last_name' => 'required',
            'gender' => 'required',
            'emirate_id' => 'required',
            'area_id' => 'required',
            'relation' => 'required',
            // 'contact_number' => 'nullable|integer|digits:9',
            'dob' => 'required|date|before:-18 years',
            'password' => 'required|string|min:8'
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->emirate_id = $request->emirate_id;
        $user->area_id = $request->area_id;
        $user->relation = $request->relation;
        $user->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Cutomer Created Successfully.'
            ],
            200
        );
    }
    public function show(Request $request, $id)
    {
        abort_if(Gate::denies('show_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Student::whereUserId($id)->get()
                ->map(function ($r, $key) {
                    $url = url('admin/students');
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $student_name = "{$r->studentName()}";
                    $name = "<a href='$url/$r->id' class='toggle' data-target='editClass'><span>$student_name</span></a>";
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
                                                     <li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                                                            class='icon ni ni-edit'></em><span>Edit</span></a>
                                                     </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'dob' => date('M m,Y', strtotime($r->dob)),
                        'school' => $r->school,
                        'medical_information' => $r->medical_information,
                        'contact_number' => $r->country_code . '' . $r->contact_no,
                        'relation' => $r->relation,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name'])
                ->make(true);
        }
        $url = url(self::URL . '/' . $id);
        $customer = User::find($id);
        return view(self::VIEW . '.show', get_defined_vars());
    }
    public function edit($id)
    {
        abort_if(Gate::denies('edit_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $customer = User::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => ['unique:users,email,' . $id],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::find($id);
        $user->fill($request->except('password'));
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }

    public function getStudent(Request $requestn, $id)
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
        return view(self::VIEW . '.add_student', get_defined_vars());
    }

    public function addStudent(Request $request)
    {
        // dd(!isset($request->register_as_student_id));

        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            // 'school' => 'required',
            // 'medical_information' => 'required',
            'contact_no' => 'required|integer',
            // 'relation' => 'required',
            // 'image' => 'required',
            'parent_id' => 'required',
            'location_id' => 'required',
            'level_id' => 'required',
            'term_condition' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'country_code' => 'required',
        ]);
        // if (!isset($request->register_as_student_id)) {
        //     $request->validate([
        //         'country_code' => 'required',
        //         'gender' => 'required',
        //     ]);
        // }
        $user = $request->parent_id ? User::find($request->parent_id) : auth()->user();
        $code = random_int(100000, 999999);
        $image = $request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/student', $name);
            $image_name = $name;
        }
        $student_records = Student::where('user_id', $request->parent_id)->get();
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
        $student->user_id = $request->parent_id;
        $student->medical_information = $request->medical_information;
        $student->term_condition = true;
        $student->name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->venue_id = $request->location_id;
        $student->swim_code = 'Swim' . $code;
        $student->discount = $sibling_discount;
        $student->gender = $request->gender ;
        $student->country_code = $request->country_code ;
        $student->register_as_student_id = 0;
        $student->image = $image_name;
        $student->save();
        if ($request->level_id != 'need') {
            AssessmentRequest::create([
                'user_id' => $request->parent_id,
                'student_id' => $student->id,
                'swimming_class_id' => $request->level_id,
                'status' => 'Enroll Now',
                'status_date' => $now,
            ]);
        } else {
            AssessmentRequest::create([
                'user_id' => $request->parent_id,
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


    public function destroy($id)
    {
        $user = User::find($id);
        $user->roles()->detach(3);
        if ($user) {
            $user->delete();
            return 1;
        }
    }
}
