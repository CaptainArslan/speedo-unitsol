<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class RoleBaseAccessController extends Controller
{
    const TITLE = 'Role Base Access';
    const VIEW = 'admin/role_base_access';
    const URL = 'admin/role-base-accesses';


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
        abort_if(Gate::denies('view_role'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Role::whereNotIn('id', [1, 2, 3])->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_role')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_role')?
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
                                               
                                              $edit
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    $titles = $r->permissions()->get()->unique('title');
                    $types = $r->permissions()->get()->unique('type');
                    // dd($types);
                    $role_access = "";
                    foreach ($types as $item) {
                        $data = "";
                        foreach ($titles as $title) {
                            if ($title->type == $item->type) {
                                $data .= " <span class='badge badge-outline-success'>
                                        <em class='icon ni ni-$item->icon'></em>
                                            <span>$title->title</span>
                                        </span>";
                            }
                        }
                        $role_access .= "  <div class='row'>
                                                <div class='col-lg-12'>
                                                    <span>$item->type</span>
                                                    
                                                    $data
                                              </div>            
                                         </div> ";
                    }
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'roleAccess' => $role_access,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'roleAccess','name'])
                ->make(true);
        }
        return view(self::VIEW . '.index');
    }


    public function create()
    {
        abort_if(Gate::denies('add_role'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $permissions = Permission::all();
        $types = $permissions->unique('type');
        $titles = $permissions->unique('title');
        return view(self::VIEW . '.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);
        $data = $request->only('name');
        $data['guard_name'] = 'web';
        $role = Role::create($data);
        $permissions = $request->except('_token', 'name');
        $role->syncPermissions([]);
        foreach ($permissions as $key => $p) {
            $permission = Permission::find($key);
            if ($permission) {
                $role->givePermissionTo($permission);
            }
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
        abort_if(Gate::denies('edit_role'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $record = Role::findOrFail($id);
        $permissions = Permission::all();
        $types = $permissions->unique('type');
        $titles = $permissions->unique('title');
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);
        $data = $request->only('name');
        $role = Role::findOrFail($id);
        $role->update($data);
        $permissions = $request->except('name');
        $role->syncPermissions([]);
        foreach ($permissions as $key => $p) {
            $permission = Permission::find($key);
            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }
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
        //
    }
}
