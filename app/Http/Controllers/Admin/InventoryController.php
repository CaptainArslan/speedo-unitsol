<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetType;
use App\Models\Image;
use App\Models\Inventory;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class InventoryController extends Controller
{
    const TITLE = 'Inventory';
    const VIEW = 'admin/inventory';
    const URL = 'admin/inventories';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'inventory',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_inventory'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Inventory::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_inventory')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->asset_name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->asset_name</span></a>";

                    }
                    $edit=$user->can('edit_inventory')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_inventory')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
                    $actions = '';
                    $price = "{$r->getPrice()}";
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
                        'asset_name' => $name,
                        'asset_type' => $r->assetType?->name,
                        'asset_number' => $r->asset_number,
                        'asset_location' => $r->venue?->name,
                        'asset_owner' => $r->user?->first_name . ' ' . $r->user?->last_name,
                        'qty' => $r->qty,
                        'description' => $r->description,
                        'price' => $price,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'asset_name', 'status', 'price', 'asset_location'])
                ->make(true);
        }
        $venues = Venue::all();
        $asset_types = AssetType::all();
        $staffs = User::whereNotNull('designation_id')->get();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'asset_name' => 'required|min:3|max:250',
            'asset_type_id' => 'required',
            'asset_number' => 'required|min:3|max:250',
            'venue_id' => 'required',
            'staff_id' => 'required',
        ]);
        $invetory = new Inventory();
        $invetory->fill($request->all());
        $invetory->user_id = Auth::id();
        $invetory->save();
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/inventory', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Inventory::class,
                    'imageable_id' => $invetory->id,
                ]);
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
        abort_if(Gate::denies('edit_inventory'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $inventory = Inventory::findOrFail($id);
        $images = $inventory->images;
        $venues = Venue::all();
        $asset_types = AssetType::all();
        $staffs = User::whereNotNull('designation_id')->get();
        return view(self::VIEW . '.edit', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->fill($request->all());
        $inventory->save();
        if (!$request->old) {
            Image::where('imageable_type', Inventory::class)->where('imageable_id', $inventory->id)->delete();
        } else {
            Image::where('imageable_type', Inventory::class)->where('imageable_id', $inventory->id)
                ->whereNotIn('id', $request->old)->delete();
        }
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/inventory', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Inventory::class,
                    'imageable_id' => $inventory->id,
                ]);
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
        $inventory = Inventory::find($id);
        if ($inventory) {
            $inventory->delete();
            return 1;
        }
    }
}
