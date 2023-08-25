<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\Designation;
use App\Models\Nationality;
use App\Models\User;
use App\Models\UserReqDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class StaffManagementController extends Controller
{
    const TITLE = 'Staff Management';
    const VIEW = 'admin/staff_management';
    const URL = 'admin/staff-managements';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'doc_image_url' => env('APP_IMAGE_URL') . 'user-req-doc',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_staff'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = User::whereNotNull('designation_id')->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $data = "{$r->getName()}";
                    $user=User::find(Auth::id());
                    if($user->can('edit_staff')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$data</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$data</span></a>";

                    }
                    $edit=$user->can('edit_staff')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_staff')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                        'contact_number' => $r->contact_number,
                        'designation' => $r->designation->name,
                        'emarate_id' => $r->getEmarateId(),
                        'status' => $status,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'emarate_id', 'status', 'designation'])
                ->make(true);
        }
        $records=$records = User::whereNotNull('designation_id')->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function create()
    {
        abort_if(Gate::denies('add_staff'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $nationalities = Nationality::all();
        $designations = Designation::all();
        $roles = Role::whereNotIn('id', [1, 2, 3])->get();
        return view(self::VIEW . '.create', get_defined_vars());
    }


    public function store(StaffRequest $request)
    {
       
    //    dd($role->permissions);
        // dd($request->all());
        $image = $request->image;
        $emirate_front = $request->emirate_front;
        $emirate_back = $request->emirate_back;
        $nda = $request->nda;
        $employee_contract = $request->employee_contract;
        $employee_image = $request->employee_image;
        $insurance_doc = $request->insurance_doc;
        $image_name = '';
        $emirate_front_image_name = '';
        $emirate_back_image_name = '';
        $nda_image_name = '';
        $employee_contract_image_name = '';
        $employee_image_name = '';
        $insurance_doc_image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/user-req-doc', $name);
            $image_name = $name;
        }
        if ($emirate_front) {
            $name = rand(10, 100) . time() . '.' . $emirate_front->getClientOriginalExtension();
            $emirate_front->storeAs('public/user-req-doc', $name);
            $emirate_front_image_name = $name;
        }
        if ($emirate_back) {
            $name = rand(10, 100) . time() . '.' . $emirate_back->getClientOriginalExtension();
            $emirate_back->storeAs('public/user-req-doc', $name);
            $emirate_back_image_name = $name;
        }
        if ($nda) {
            $name = rand(10, 100) . time() . '.' . $nda->getClientOriginalExtension();
            $nda->storeAs('public/user-req-doc', $name);
            $nda_image_name = $name;
        }
        if ($employee_contract) {
            $name = rand(10, 100) . time() . '.' . $employee_contract->getClientOriginalExtension();
            $employee_contract->storeAs('public/user-req-doc', $name);
            $employee_contract_image_name = $name;
        }
        if ($employee_image) {
            $name = rand(10, 100) . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->storeAs('public/user-req-doc', $name);
            $employee_image_name = $name;
        }
        if ($insurance_doc) {
            $name = rand(10, 100) . time() . '.' . $insurance_doc->getClientOriginalExtension();
            $insurance_doc->storeAs('public/user-req-doc', $name);
            $insurance_doc_image_name = $name;
        }
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->country_code = +971;
        $user->is_admin = true;
        $user->save();
        $user_re_doc = UserReqDoc::create([
            'user_id' => $user->id,
            'image' => $image_name,
            'emirate_front_img' => $emirate_front_image_name,
            'emirate_back_img' => $emirate_back_image_name,
            'nda' => $nda_image_name,
            'employee_contract' => $employee_contract_image_name,
            'employee_image' => $employee_image_name,
            'insurance_doc' => $insurance_doc_image_name,
        ]);
        if($request->employee_role){
            $user->assignRole($request->employee_role);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Add Successfully'
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
        abort_if(Gate::denies('edit_staff'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $user = User::find($id);
        $user_doc = $user->userDoc;
        $nationalities = Nationality::all();
        $designations = Designation::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        $user = User::find($id);
        $user_req_doc = UserReqDoc::where('user_id', $user->id)->first();
        $image = $request->image;
        $emirate_front = $request->emirate_front;
        $emirate_back = $request->emirate_back;
        $nda = $request->nda;
        $employee_contract = $request->employee_contract;
        $employee_image = $request->employee_image;
        $insurance_doc = $request->insurance_doc;
        $image_name = '';
        $emirate_front_image_name = '';
        $emirate_back_image_name = '';
        $nda_image_name = '';
        $employee_contract_image_name = '';
        $employee_image_name = '';
        $insurance_doc_image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/user-req-doc', $name);
            $image_name = $name;
        }
        if ($emirate_front) {
            $name = rand(10, 100) . time() . '.' . $emirate_front->getClientOriginalExtension();
            $emirate_front->storeAs('public/user-req-doc', $name);
            $emirate_front_image_name = $name;
        }
        if ($emirate_back) {
            $name = rand(10, 100) . time() . '.' . $emirate_back->getClientOriginalExtension();
            $emirate_back->storeAs('public/user-req-doc', $name);
            $emirate_back_image_name = $name;
        }
        if ($nda) {
            $name = rand(10, 100) . time() . '.' . $nda->getClientOriginalExtension();
            $nda->storeAs('public/user-req-doc', $name);
            $nda_image_name = $name;
        }
        if ($employee_contract) {
            $name = rand(10, 100) . time() . '.' . $employee_contract->getClientOriginalExtension();
            $employee_contract->storeAs('public/user-req-doc', $name);
            $employee_contract_image_name = $name;
        }
        if ($employee_image) {
            $name = rand(10, 100) . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->storeAs('public/user-req-doc', $name);
            $employee_image_name = $name;
        }
        if ($insurance_doc) {
            $name = rand(10, 100) . time() . '.' . $insurance_doc->getClientOriginalExtension();
            $insurance_doc->storeAs('public/user-req-doc', $name);
            $insurance_doc_image_name = $name;
        }
        $user->fill($request->except('password'));
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();
        $user_req_doc->update([
            'image' => $image_name ? $image_name : $user_req_doc->image,
            'emirate_front_img' => $emirate_front_image_name ? $emirate_front_image_name : $user_req_doc->emirate_front_img,
            'emirate_back_img' => $emirate_back_image_name ? $emirate_back_image_name : $user_req_doc->emirate_back_img,
            'nda' => $nda_image_name ? $nda_image_name : $user_req_doc->nda,
            'employee_contract' => $employee_contract_image_name ? $employee_contract_image_name : $user_req_doc->employee_contract,
            'employee_image' => $employee_image_name ? $employee_image_name : $user_req_doc->employee_image,
            'insurance_doc' => $insurance_doc_image_name ? $insurance_doc_image_name : $user_req_doc->insurance_doc,
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            UserReqDoc::where('user_id', $id)->delete();
            $user->delete();
            return 1;
        }
    }
}
