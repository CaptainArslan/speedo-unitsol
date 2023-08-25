<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\EmployeeDay;
use App\Models\EmployeeSchedule;
use App\Models\SwimmingClass;
use App\Models\TermBaseBooking;
use App\Models\User;
use App\Models\Venue;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class EmployeeSchedulingController extends Controller
{
    const TITLE = 'Employee Scheduling';
    const VIEW = 'admin/employee_scheduling';
    const URL = 'admin/employee-schedulings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'user-req-doc',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $records = EmployeeSchedule::latest()->get()
                ->map(function ($r, $key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $data = "{$r->employee->getEmployeeName()}";
                    $name = "<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$data</span></a>";
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
                                                    <li><a href='$url/$r->id' class='toggle' data-target='editClass'><em
                                                                class='icon ni ni-eye'></em><span>View</span></a>
                                                    </li>
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
                        'contact_number' => $r?->employee?->contact_number,
                        'start_date' => date('M d,Y', strtotime($r->start_date)),
                        'end_date' => date('M d, Y', strtotime($r->end_date)),
                        'venue' => $r?->venue?->name,
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions', 'name'])
                ->make(true);
        }
        $records = EmployeeSchedule::count();
        return view(self::VIEW . '.index', get_defined_vars());
    }

    public function create()
    {
        $employees = User::whereNotNull('designation_id')->get();
        $venues = Venue::all();
        $days = Day::all();
        return view(self::VIEW . '.create', get_defined_vars());
    }
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $employee_scheduling = EmployeeSchedule::find($id);
            $records = [];
            $period = CarbonPeriod::create($employee_scheduling->start_date, $employee_scheduling->end_date);
            $dates = $period->toArray();
            foreach ($dates as $data) {
                $url = url(self::URL);
                $delete_url = $this->toString($url . '/' . $employee_scheduling->id);
                $date = $data->format('d M Y');
                $day = $data->format('l');
                $dates = "
                       <span class='badge badge-warning ml-2 text-white'>$day</span></br>$date";
                $record = [
                    'id' => $employee_scheduling->id,
                    'date' => $dates,
                    'start_time' =>  date('h:i A', strtotime($employee_scheduling->start_time)),
                    'end_time' =>  date('h:i A', strtotime($employee_scheduling->end_time)),
                    'venue' => $employee_scheduling?->venue?->name,
                ];
                $records[] = $record;
            }
            $data = collect($records);
            $data->map(function ($r) {
                return [
                    'date' => $r['date'],
                    'start_time' => $r['start_time'],
                    'end_time' => $r['end_time'],
                    'venue' => $r['venue'],
                ];
            });
            return DataTables::of($data)
                ->rawColumns(['date'])
                ->make(true);
        }
        $employee_scheduling = EmployeeSchedule::find($id);
        $user = $employee_scheduling->employee;
        $venues = Venue::all();
        $url = url(self::URL . '/' . $id);
        return view(self::VIEW . '.show', get_defined_vars());
    }


    public function store(Request $request)
    {
        $request->validate([
            'venue_id' => 'required',
            'day_id' => 'required',
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'start_time' => 'required|',
            'end_time' => 'required|after_or_equal:start_time',
        ]);

        $employee_scheduling = new EmployeeSchedule();
        $employee_scheduling->fill($request->all());
        $employee_scheduling->user_id = Auth::id();
        $employee_scheduling->save();
        foreach ($request->day_id as $day) {
            EmployeeDay::create([
                'employee_schedule_id' => $employee_scheduling->id,
                'day_id' => $day,
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





    public function edit($id)
    {
        $record = EmployeeSchedule::find($id);
        $employees = User::whereNotNull('designation_id')->get();
        $venues = Venue::all();
        $days = Day::all();
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'venue_id' => 'required',
            'day_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'start_time' => 'required|',
            'end_time' => 'required|after_or_equal:start_time',
        ]);

        $employee_scheduling = EmployeeSchedule::find($id);
        $employee_scheduling->fill($request->all());
        $employee_scheduling->save();
        EmployeeDay::where('employee_schedule_id', $employee_scheduling->id)->delete();
        foreach ($request->day_id as $day) {
            EmployeeDay::create([
                'employee_schedule_id' => $employee_scheduling->id,
                'day_id' => $day,
            ]);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update  Successfully'
            ],
            200
        );
    }


    public function destroy($id)
    {
        //
    }
    public function employeeSchecduleCalendar(Request $request)
    {
        $employees=User::where('is_trainer',true)->withTrashed()->get();
        $records = TermBaseBooking::byEmployee($request->employee)
            ->where('parent_id', '!=', 0)->get();
        return view(self::VIEW . '.employee_schecdule_calendar', get_defined_vars());
    }
}
