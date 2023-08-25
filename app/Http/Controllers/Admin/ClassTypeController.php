<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class ClassTypeController extends Controller
{
    const TITLE = 'Class Type';
    const VIEW = 'admin/class_type';
    const URL = 'admin/class-types';


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
        abort_if(Gate::denies('view_class_type'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = ClassType::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_class_type')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_class_type')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_class_type')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                                        $edit
                                        $delete
                                    </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                   return [
                       'id' => $key+1,
                       'name' => $name,
                       'class_occurrence'=>$r->class_occurrence,
                       'actions' => $actions,
                       
                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','name'])
                ->make(true);
        }
        $records = ClassType::count();
        return view(self::VIEW . '.index',get_defined_vars());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class_occurrence' => 'required|integer',
        ]);
        $class_type = new ClassType();
        $class_type->fill($request->all());
        $class_type->user_id = Auth::id();
        $class_type->save();
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
        abort_if(Gate::denies('edit_class_type'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $class_type = ClassType::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'class_occurrence' => 'required|integer',
        ]);
        
        $class_type = ClassType::find($id);
        $class_type->fill($request->all());
        $class_type->save();
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
        $class_type = ClassType::find($id);
        if ($class_type) {
            $class_type->delete();
            return 1;
        }
    }
}
