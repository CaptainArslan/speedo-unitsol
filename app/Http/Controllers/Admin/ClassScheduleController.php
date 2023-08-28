<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingPackage;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class ClassScheduleController extends Controller
{
    const TITLE = 'Class Schedule';
    const VIEW = 'admin/class_schedule';
    const URL = 'admin/class-schedules';

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
        // $venue_id=$
        abort_if(Gate::denies('view_class_scedule'), Response::HTTP_FORBIDDEN, 'Forbidden');
        if ($request->ajax()) {
            $venue = $request->venue != "null" ? $request->venue : null;
            $start_date = $request->start_date != "null" ? $request->start_date : null;
            $end_date = $request->end_date != "null" ? $request->end_date : null;
            $s_date=Carbon::parse($start_date);
            $e_date=Carbon::parse($end_date);
            // dd($start_date,$end_date);
            $records = TermBaseBooking::byVenue($venue)
                ->byStartDate($s_date)
                ->byEndDate($e_date)
                // ->byEndDate($start_date, $end_date)
                // ->whereRaw('"' . $s_date . '" between `start_date` and `end_date`')
                // ->whereRaw('"' . $e_date . '" between `start_date` and `end_date`')
                ->where('parent_id', '!=', 0)->latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('show_class_scedule')){
                        $name="<a href='$url/$r->id?q=1' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $show=$user->can('show_class_scedule')?
                        "<li><a href='$url/$r->id' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    
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
                                               $show
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'name' => $name,
                        'duration' => $r->start_date . ' to ' . $r->end_date,
                        'class' => $r->class->name . ' -AED ' . $r->class->price,
                        'no_of_student' => $r->no_of_student,
                        'days' => $r->dayNames(),
                        'trainer' => $r->user?->first_name.' '.$r->user?->last_name,
                        'venue' => $r->venue?->name,
                        'timing' => $r->timing?->getName(),
                        'booked' => $r->tolalSlotBooked(),
                        'packages' => $r->termPackages(),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name', 'duration','days','packages', 'class', 'timing'])
                ->make(true);
        }
        $venues = Venue::all();
        $start_date = $request->start_date != "null" ? $request->start_date : null;
        $end_date = $request->end_date != "null" ? $request->end_date : null;
        $venue = $request->venue != "null" ? $request->venue : null;
        $s_date=Carbon::parse($start_date);
        $e_date = Carbon::parse($end_date);
        // dd($start_date,$end_date);
        $records = TermBaseBooking::byVenue($venue)
        ->whereRaw('"' . $s_date . '" between `start_date` and `end_date`')
            ->whereRaw('"' . $e_date . '" between `start_date` and `end_date`')
            ->where('parent_id', '!=', 0)->get()->count();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function show(Request $request,$id){
        abort_if(Gate::denies('show_class_scedule'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if($request->q == 1){
            $term=TermBaseBooking::find($id);
            $term_students=$term->termStudents;
        }else{
            $term=TermBaseBookingPackage::find($id);
            $term_students = $term?->packageStudents;
        }
        return view(self::VIEW . '.show', get_defined_vars());
    }
}
