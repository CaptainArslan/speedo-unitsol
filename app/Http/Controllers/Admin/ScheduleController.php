<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Image;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\ScheduleDays;
use App\Models\SwimmingClass;
use App\Models\TermBaseBooking;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    const TITLE = 'Schedule';
    const VIEW = 'admin/schedule';
    const URL = 'admin/schedules';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'schedule',
        ]);
    }
    public function index()
    {
        abort_if(Gate::denies('view_schedule'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $days = Day::all();
        $classes = SwimmingClass::all();
        $venues = Venue::all();
        // $schedules = Schedule::all();
        $schedules = TermBaseBooking::where('parent_id', 0)->get();
        
        // $records = [];
        // foreach ($schedules as $schedule) {
        //     $period = CarbonPeriod::create($schedule->start_date, $schedule->end_date);
        //     $dates = $period->toArray();
        //     // dd($schedule->dayNames());
        //     foreach ($schedule->dayNames() as $day_name) {
        //         foreach ($dates as $date) {
        //             if ($date->format('l') == $day_name) {
        //                 $record = [
        //                     'id' => $schedule->id,
        //                     'class_name' => $schedule->class_name,
        //                     'color' => $schedule->class->color,
        //                     'start_date' => $date->format('d-m-Y'),
        //                 ];
        //                 $records[] = $record;
        //             }
        //         }
        //     }
        // }
        // dd($records);
        $trainers = User::where('is_trainer', true)->get();
        return view(self::VIEW . '.index', get_defined_vars());
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'no_of_student' => 'required',
            'day_id' => 'required',
            'class_id' => 'required',
            'venue_id' => 'required',
            'trainer_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
        ]);
        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->discount = $request->discount ? $request->discount : 0;
        $schedule->swimming_class_id = $request->class_id;
        $schedule->save();
        foreach ($request['day_id'] as $day) {
            ScheduleDays::create([
                'day_id' => $day,
                'schedule_id' => $schedule->id,
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
        
        $days = Day::all();
        $classes = SwimmingClass::all();
        $venues = Venue::all();
        $trainers = User::where('is_trainer', true)->get();
        $schedule = Schedule::find($id);
        $images = $schedule->images;
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
        ]);
        $schedule = Schedule::find($id);
        $schedule->fill($request->all());
        $schedule->swimming_class_id = $request->class_id;
        $schedule->save();
        if ($request['day_id']) {
            ScheduleDays::where('schedule_id', $id)->delete();
            foreach ($request['day_id'] as $day) {
                ScheduleDays::create([
                    'day_id' => $day,
                    'schedule_id' => $schedule->id,
                ]);
            }
        }
        if (!$request->old) {
            Image::where('imageable_type', Schedule::class)->where('imageable_id', $schedule->id)->delete();
        } else {
            Image::where('imageable_type', Schedule::class)->where('imageable_id', $schedule->id)
                ->whereNotIn('id', $request->old)->delete();
        }
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/schedule', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Schedule::class,
                    'imageable_id' => $schedule->id,
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
        $schedule = Schedule::find($id);
        if ($schedule) {
            Image::where('imageable_type', Schedule::class)->where('imageable_id', $schedule->id)->delete();
            $schedule->delete();
            return 1;
        }
    }
    public function classSubscription($id)
    {
        $record = Package::where('swimming_class_id', $id)->get();
        return view('admin.schedule.partial.index', get_defined_vars());
    }
}
