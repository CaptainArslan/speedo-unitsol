<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetType;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class AssetTypeController extends Controller
{
    const TITLE = 'Asset Type';
    const VIEW = 'admin/asset_type';
    const URL = 'admin/asset-types';


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
        abort_if(Gate::denies('view_asset_type'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = AssetType::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_asset_type')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_asset_type')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_asset_type')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                       'actions' => $actions,
                       
                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','name'])
                ->make(true);
        }
        $records=AssetType::count();
        return view(self::VIEW . '.index',get_defined_vars());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $asset_type = new AssetType();
        $asset_type->fill($request->all());
        $asset_type->user_id = Auth::id();
        $asset_type->save();
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
        abort_if(Gate::denies('edit_asset_type'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $asset_type = AssetType::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $asset_type = AssetType::find($id);
        $asset_type->fill($request->all());
        $asset_type->save();
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
        abort_if(Gate::denies('delete_asset_type'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $asset_type = AssetType::find($id);
        if ($asset_type) {
            $asset_type->delete();
            return 1;
        }
    }
}
