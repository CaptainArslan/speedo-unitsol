<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CancelationPolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class CancelationPolicyController extends Controller
{
    const TITLE = 'Cancelation Policy';
    const VIEW = 'admin/cancelation_policy';
    const URL = 'admin/cancelation-policies';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'cancelation_policy',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_cancelation'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = CancelationPolicy::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    $pdf_url=env('APP_IMAGE_URL') . 'cancelation_policy/'.$r->pdf;
                    $pdf="<a href='$pdf_url'  target='_blank' class='toggle'><span>$r->title.pdf</span></a>";
                    if($user->can('edit_cancelation')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->title</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->title</span></a>";

                    }
                    $edit=$user->can('edit_cancelation')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_cancelation')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                        'pdf' => $pdf,
                        'title' => $name,
                        'content' => $r->content,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','title','pdf'])
                ->make(true);
        }
        return view(self::VIEW . '.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:250',
            'content' => 'required',
            'pdf' => 'required|mimes:pdf',
        ]);
        $pdf = $request->pdf;
        $pdf_name = '';
        if ($pdf) {
            $name = rand(10, 100) . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('public/cancelation_policy', $name);
            $pdf_name = $name;
        }
        $cancelation_policy = new CancelationPolicy();
        $cancelation_policy->fill($request->all());
        $cancelation_policy->pdf = $pdf_name;
        $cancelation_policy->user_id = Auth::id();
        $cancelation_policy->save();
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
        abort_if(Gate::denies('edit_cancelation'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $cancelation_policy = CancelationPolicy::findOrFail($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $cancelation_policy = CancelationPolicy::find($id);
        $pdf = $request->pdf;
        $pdf_name = '';
        if ($pdf) {
            $name = rand(10, 100) . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('public/cancelation_policy', $name);
            $pdf_name = $name;
        }
        $cancelation_policy->fill($request->all());
        $cancelation_policy->pdf = $pdf_name ? $pdf_name : $cancelation_policy->pdf;
        $cancelation_policy->save();
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
        $policy = CancelationPolicy::find($id);
        if ($policy) {
            $policy->delete();
            return 1;
        }
    }
}
