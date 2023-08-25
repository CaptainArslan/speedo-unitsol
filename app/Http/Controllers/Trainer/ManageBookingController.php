<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\ClassSession;
use App\Models\TermBaseBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageBookingController extends Controller
{
    const TITLE = 'Manage Booking';
    const VIEW = 'trainer/manage_booking';
    const URL = 'trainer/manage-bookings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function index(Request $request)
    {
        $terms = TermBaseBooking::where('trainer_id', Auth::id())->get();
        $records = [];
        if($request->date){
            $date=Carbon::parse($request->date);

        }else{
            $now = Carbon::now();
            $date = Carbon::parse($now->format('Y-m-d'));
        }
        // dd($date->format('l'));
        $day = $date->format('l');
            foreach ($terms as $class) {
                if ($class->checkClassByDate($date)) {
                    if (count($class->termStudents) != 0) {
                        if ($class->attandanceDayTrainerCheck($day)) {
                            
                            $current_date = Carbon::now();
                            $lession_takes = ClassSession::where('class_id', $class->id)
                                                            ->where('type', 'term')
                            ->count();
                            $record = [
                                'term_id' => $class->id,
                                'name' => $class->name,
                                'venue' => $class->venue?->name,
                            'class' => $class->class?->name,
                            'class_color' => $class->class?->color,
                            'timing' => $class->timing?->getName(),
                            'total_lesson' => $class->no_of_class,
                            'start_date' => date('F d, Y', strtotime($class->start_date)),
                            'end_date' => date('F d, Y', strtotime($class->end_date)),
                            'day' => $day,
                            'remaining_lesson' => $class->no_of_class - $lession_takes,
                                'students' => count($class->termStudents),
                                'type' => 'term',
                                'date' => date('M d,Y', strtotime($date)),
                            ];
                            $records[] = $record;
                        }
                    }
                }
            }
            foreach ($terms as $class) {
                foreach ($class->termBaseBookingPackages as $package) {
                if ($class->checkClassByDate($date)) {
                        if (count($package->packageStudents) != 0) {
                            if ($class->attandanceDayTrainerCheck($day)) {
                                $current_date = Carbon::now();
                                $package_lession_takes = ClassSession::where('class_id', $package->id)
                                ->where('type', 'package')
                                ->count();
                                $record = [
                                    'term_id' => $package->id,
                                    'name' => $package->name,
                                    'venue' => $class->venue?->name,
                                'class' => $class->class?->name,
                                'class_color' => $class->class?->color,
                                'timing' => $class->timing?->getName(),
                                'total_lesson' => $package->no_of_class,
                                'remain_lesson' => $package->no_of_class,
                                'start_date' => date('F d, Y', strtotime($package->start_date)),
                                'end_date' => date('F d, Y', strtotime($package->end_date)),
                                'day' => $day,
                                'remaining_lesson' => $package->no_of_class - $package_lession_takes,
                                    'students' => count($package->packageStudents),
                                    'type' => 'package',
                                    'date' => date('M d,Y', strtotime($date)),
                                ];
                                $records[] = $record;
                            }
                        }
                    }
                }
            }
        $collections = collect($records);
        return view(self::VIEW . '.index', get_defined_vars());
    }
}
