<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\SwimmingClass;
use App\Models\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubscriptionController extends Controller
{
    const TITLE = 'Subscription';
    const VIEW = 'admin/subscription';
    const URL = 'admin/subscriptions';


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
        if ($request->ajax()) {
            $records = Package::all()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    $actions = '';
                    $status = "{$r->getStatus()}";
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
                                                    <li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                                                                class='icon ni ni-edit'></em><span>Edit</span></a>
                                                    </li>
                                                    <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                                                                class='icon ni ni-trash'></em><span>Delete</span></a>
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
                        'class' => $r->swimmingClass->name,
                        'timing' => $r->timing->getName(),
                        'price' => $price,
                        'status' => $status,
                        'created_at' => $r->created_at->format('M d,Y'),
                        'updated_at' => $r->updated_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'status','name', 'price'])
                ->make(true);
        }
        $classes = SwimmingClass::all();
        $timings = Timing::all();
        return view(self::VIEW . '.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'swimming_class_id' => 'required',
            'timing_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = new Package();
        $product->fill($request->all());
        $product->user_id = Auth::id();
        $product->save();
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
        $subscription = Package::findOrFail($id);
        $classes = SwimmingClass::all();
        $timings = Timing::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $subscription = Package::find($id);
        $subscription->fill($request->all());
        $subscription->save();
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
        $package = Package::find($id);
        if ($package) {
            $package->delete();
            return 1;
        }
    }
}
