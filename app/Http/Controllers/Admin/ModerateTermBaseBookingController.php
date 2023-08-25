<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TermBaseBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
class ModerateTermBaseBookingController extends Controller
{
    const TITLE = 'Term Base Booking';
    const VIEW = 'admin/moderate_term_base_booking';
    const URL = 'admin/moderate-term-base-bookings';


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
        if(auth()->user()->id !=1){

            abort_if(Gate::denies('moderate_term_base_booking'), Response::HTTP_FORBIDDEN, 'Forbidden');
        }
        if ($request->ajax()) {
            $records = TermBaseBooking::where('parent_id', 0)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url('admin/term-base-bookings');
                    $approve_url = $this->toString('admin/term_base_booking_approved/' . $r->id);
                    $user = User::find(Auth::id());

                    if ($user->can('edit_term_base_booking')) {
                        $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    } else {
                        $name = "<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }
                    $edit = $user->can('edit_term_base_booking') ?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>" : "";
                        $check = $r->is_approved == true ? 'checked' : '';
                        $data= $check == true ? " <span class='badge badge-success ml-2 text-white'>Approved</span>" : 
                        " <span class='badge badge-warning ml-2 text-white'>Pending Approval</span>";
                        $is_approved = " <span class='badge badge-success ml-2 text-white'>Approved</span>";
                $is_approved =  "<label class='switch'><input type='checkbox' value='$r->is_approved' $check onchange='termBaseBookingApproved(event,$approve_url)'><span class='slider round'></span></label>$data";
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
                        'is_approved' => $is_approved,
                        'duration' => $r->start_date . ' to ' . $r->end_date,
                        'class' => $r->class?->name . ' -AED ' . $r->class?->price,
                        'no_of_student' => $r->no_of_student,
                        'days' => $r->dayNames2(),
                        'detail' => $r->getTrainerList(),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'duration', 'class', 'is_approved','detail'])
                ->make(true);
        }
        $records = TermBaseBooking::where('parent_id', 0)->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }

    public function termBaseBookingApproved(Request  $request, $id)
    {
        // dd($request->is_approve == 'on');
        $record=TermBaseBooking::find($id);
        $terms=TermBaseBooking::where('parent_id',$id)->get();
        
        $record->update([
            'is_approved' => $request->is_approve == 1 ? true : false,
        ]);
        foreach($terms as $term){
            $term->update([
                'is_approved' => $request->is_approve == 1 ? true : false,
            ]);
        }
        return response()->json(['status' => true, 'message' => $request->is_approve == 1 ? 'Appreved' : 'Pending Approval'], 200);

    }
}
