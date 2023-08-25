<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\SwimmingClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class AssessmentController extends Controller
{
    const TITLE = 'Assessment';
    const VIEW = 'admin/assessment';
    const URL = 'admin/assessments';


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
        abort_if(Gate::denies('view_assessment'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = Assessment::where('parent_id', 0)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user = User::find(Auth::id());
                    $class_name =$r->class?->name;
                    if ($user->can('edit_assessment')) {
                        $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$class_name</span></a>";
                    } else {
                        $name = "<a href='#' class='toggle' data-target='editClass'><span>$class_name</span></a>";
                    }
                    $edit = $user->can('edit_assessment') ?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>" : "";
                    $delete = $user->can('delete_assessment') ? " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                        'id' => $key + 1,
                        'class' => $name,
                        'name' => $r->getAssessmentList(),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name','class'])
                ->make(true);
        }
        $records = Assessment::where('parent_id', 0)->count();
        $classes = SwimmingClass::all();
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
            'class_id' => 'required',
            'assessment' => 'required',
        ]);
        
        $assessmen_parent=Assessment::create(['user_id' => Auth::id(),
            'swimming_class_id' => $request->class_id,
        ]);
        
        foreach ($request['assessment'] as $detail) {
           
            $term_base_booking_package = Assessment::create([
                'user_id' => Auth::id(),
                'swimming_class_id' => $request->class_id,
                'parent_id' => $assessmen_parent->id,
                'name' => $detail['name'],
                'description' => $detail['description'],
            ]);
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
        abort_if(Gate::denies('edit_assessment'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $assessment = Assessment::findOrFail($id);
        $classes = SwimmingClass::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $assesment = Assessment::find($id);
        $old_assessment = Assessment::where('parent_id', $id)->get();
        $assesment->update([
            'swimming_class_id' => $request->class_id,
        ]);
        $current_child_assessment = collect($request['assessment']);
        $old_child_assessment_id = $old_assessment->pluck('id');
        $current_assessment_id = $current_child_assessment->pluck('assessment_id');
        $delete_assessment_id = array_diff($old_child_assessment_id->all(), $current_assessment_id->all());
        // dd($delete_assessment_id);
        $this->deleteAssessment($delete_assessment_id);
        foreach ($request['assessment'] as $detail) {
            if (isset($detail['assessment_id'])) {
                $record = Assessment::where('id', $detail['assessment_id'])->first();
                if (!is_null($record)) {
                    $record->update([
                        'swimming_class_id' => $request->class_id,
                        'name' => $detail['name'],
                        'description' => $detail['description'],
                    ]);
                }
            } else {
                Assessment::create([
                    'user_id' => Auth::id(),
                    'swimming_class_id' => $request->class_id,
                    'parent_id' => $assesment->id,
                    'name' => $detail['name'],
                    'description' => $detail['description'],
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

    public function deleteAssessment($ids)
    {
        $assessments = Assessment::whereIn('id', $ids)->get();
        if (!$assessments->isEmpty()) {
            Assessment::whereIn('id', $ids)->delete();
            return 1;
        }
    }
    public function destroy($id)
    {
        $assesment = Assessment::find($id);
        if ($assesment) {
            Assessment::where('parent_id', $id)->delete();
            $assesment->delete();
            return 1;
        }
    }
}
