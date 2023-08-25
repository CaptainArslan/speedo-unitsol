<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class PromoCodeController extends Controller
{
    const TITLE = 'Promo Code';
    const VIEW = 'admin/promo_code';
    const URL = 'admin/promo-codes';


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
        abort_if(Gate::denies('view_promo_code'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = PromoCode::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_promo_code')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->code</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->code</span></a>";

                    }
                    $edit=$user->can('edit_promo_code')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_promo_code')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
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
                        'code' => $name,
                        'description' => $r->description,
                        'discount' => $r->discount.'%',
                        'start_date' => date('M m,Y', strtotime($r->start_date)),
                        'end_date' => date('M m,Y', strtotime($r->end_date)),
                        'created_at' => $r->created_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'code','status', 'price', 'estimated_replacement_cost'])
                ->make(true);
        }
        $records = PromoCode::count();
        return view(self::VIEW . '.index',get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|min:3|max:250',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'required',
        ]);
        $invetory = new PromoCode();
        $invetory->fill($request->all());
        $invetory->user_id = Auth::id();
        $invetory->save();
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
        abort_if(Gate::denies('edit_promo_code'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $promo_code = PromoCode::findOrFail($id);
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $promo_code = PromoCode::findOrFail($id);
        $promo_code->fill($request->all());
        $promo_code->save();
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
        $promo_code = PromoCode::find($id);
        if ($promo_code) {
            $promo_code->delete();
            return 1;
        }
    }
}
