<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\SwimmingClass;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class ClassController extends Controller
{
    const TITLE = 'Class';
    const VIEW = 'admin/class';
    const URL = 'admin/classes';


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
        abort_if(Gate::denies('view_class'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = SwimmingClass::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                   
                    $user=User::find(Auth::id());
                    if($user->can('edit_class')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_class')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_class')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                        'age_group' => $r->age_group,
                        // 'timing' => $r->timing->getName(),
                        'no_of_student' => $r->no_of_student,
                        'price' => $r->price,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'status' => $status,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'status','name','timing'])
                ->make(true);
        }
        $records = SwimmingClass::count();
        $timings = Timing::all();
        return view(self::VIEW . '.index', get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'age_group' => 'required',
            'color' => 'required',
            // 'timing_id' => 'required',
            'no_of_student' => 'required',
            'price' => 'required',
        ]);
        $class = new SwimmingClass();
        $class->fill($request->all());
        
        $class->user_id = Auth::id();
        $class->save();
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/class', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => SwimmingClass::class,
                    'imageable_id' => $class->id,
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
        abort_if(Gate::denies('edit_class'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $class = SwimmingClass::findOrFail($id);
        $timings = Timing::all();
        $images = $class->images;
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $class = SwimmingClass::find($id);
        $class->fill($request->all());
        if (!$request->old) {
            Image::where('imageable_type', SwimmingClass::class)->where('imageable_id', $class->id)->delete();
        } else {
            Image::where('imageable_type', SwimmingClass::class)->where('imageable_id', $class->id)
                ->whereNotIn('id', $request->old)->delete();
        }
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/class', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => SwimmingClass::class,
                    'imageable_id' => $class->id,
                ]);
            }
        }
        $class->save();
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
        $class = SwimmingClass::find($id);
        if ($class) {
            $class->delete();
            return 1;
        }
    }
}
