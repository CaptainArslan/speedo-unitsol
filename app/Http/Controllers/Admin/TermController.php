<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\TermBlackout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TermController extends Controller
{

    const TITLE = 'Terms';
    const VIEW = 'admin/term';
    const URL = 'admin/terms';


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
        // abort_if(Gate::denies('view_assessment'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $records = Term::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user = User::find(Auth::id());
                    $class_name = $r?->name;
                    $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$class_name</span></a>";

                    $edit =
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>";
                    $delete = " <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>";
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
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'duration' => date('M d Y', strtotime($r->start_date)) . ' to ' . date('M d Y', strtotime($r->end_date)),
                        'actions' => $actions,
                        'blackout' => $r->getBlackoutList(),

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'blackout'])
                ->make(true);
        }
        $records = Term::count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function create()
    {
        return view(self::VIEW . '.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
        ]);
        $record = Term::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        if($request['blackout']){
            foreach ($request['blackout'] as $blackout) {
                TermBlackout::create([
                    'term_id' => $record->id,
                    'start_date' => $blackout['blackout_start_date'],
                    'end_date' => $blackout['blackout_end_date'],
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
        $record = Term::find($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
        ]);
        $record = Term::find($id);

        $record->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        TermBlackout::where('term_id', $record->id)->delete();
        if($request['blackout']){
            foreach ($request['blackout'] as $blackout) {
                TermBlackout::create([
                    'term_id' => $record->id,
                    'start_date' => $blackout['blackout_start_date'],
                    'end_date' => $blackout['blackout_end_date'],
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
        $record = Term::find($id);
        if ($record) {
            $record->delete();
            return 1;
        }
    }
}
