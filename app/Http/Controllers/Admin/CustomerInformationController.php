<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

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
                    $user=User::find(Auth::id());
                    if($user->can('edit_class')){
                        $name="<a href='$url/$r->id' class='toggle' data-target='editClass'><span>$data</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$data</span></a>";

                    }
                        $show = $user->can('show_customer') ?
                        "<li><a href='$url/$r->id' class='toggle' data-target='editClass'><em
                        class='icon ni ni-eye'></em><span>View</span></a>
                        </li>":""; 
                        $edit=$user->can('edit_customer')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_customer')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
    public function show(Request $request, $id)
    {
        abort_if(Gate::denies('show_customer'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Student::whereUserId($id)->get()
                ->map(function ($r, $key) {
                    $url = url('admin/students');
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $student_name = "{$r->studentName()}";
                    $name="<a href='$url/$r->id' class='toggle' data-target='editClass'><span>$student_name</span></a>";
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
                        'contact_number' => $r->country_code.''.$r->contact_no,
                        'relation' => $r->relation,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','name'])
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
