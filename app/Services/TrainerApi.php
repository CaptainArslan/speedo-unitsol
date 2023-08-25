<?php

namespace App\Services;

use App\Models\AssessmentRequest;
use App\Models\ClassAssessment;
use App\Models\ClassGrading;
use App\Models\ClassSession;
use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\TermBaseBooking;
use Carbon\Carbon;

class TrainerApi
{
    public function  swimmingSessions($request)
    {
        $terms = TermBaseBooking::where('trainer_id', $request->user_id)->get();
        $records = [];
        foreach ($terms as $class) {
            if ($class->checkDate()) {
                if (count($class->termStudents) != 0) {
                    if ($class->attandanceDays()) {
                        $current_date = Carbon::now();
                        $lession_takes = ClassSession::where('class_id', $class->id)
                            ->where('type', 'term')
                            ->count();
                        $record = [
                            'term_id' => $class->id,
                            'name' => $class->name,
                            'students' => count($class->termStudents),
                            'students' => count($class->termStudents),
                            'venue' => $class->venue?->name,
                            'class' => $class->class?->name,
                            'class_color' => $class->class?->color,
                            'timing' => $class->timing?->getName(),
                            'total_lesson' => $class->no_of_class,
                            'remaining_lesson' => $class->no_of_class - $lession_takes,
                            'type' => 'term',
                            'date' => $current_date->format('d M y'),
                        ];
                        $records[] = $record;
                    }
                }
            }
        }
        foreach ($terms as $class) {
            foreach ($class->termBaseBookingPackages as $package) {
                if ($class->checkDate()) {
                    if (count($package->packageStudents) != 0) {
                        if ($class->attandanceDays()) {
                            $current_date = Carbon::now();
                            $package_lession_takes = ClassSession::where('class_id', $package->id)
                                ->where('type', 'package')
                                ->count();
                            $record = [
                                'term_id' => $package->id,
                                'name' => $package->name,
                                'students' => count($package->packageStudents),
                                'venue' => $class->venue?->name,
                                'class' => $class->class?->name,
                                'class_color' => $class->class?->color,
                                'timing' => $class->timing?->getName(),
                                'total_lesson' => $package->no_of_class,
                                'remain_lesson' => $package->no_of_class,
                                'remaining_lesson' => $package->no_of_class - $package_lession_takes,
                                'type' => 'package',
                                'date' => $current_date->format('d M y'),
                            ];
                            $records[] = $record;
                        }
                    }
                }
            }
        }
        return $records;
    }
    public function  sessionByDate($request)
    {
        // dd($request);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $terms = TermBaseBooking::where('trainer_id', $request->user_id)
        ->where('parent_id', '!=', 0)->get();
        
        $records = [];
        $date = Carbon::parse($request->date);
        $day = $date->format('l');
        foreach ($terms as $class) {
            if ($class->checkClassByDate($request->date)) {
                if (count($class->termStudents) != 0) {
                    if ($class->attandanceDayTrainerCheck($day)) {
                        $current_date = Carbon::now();
                        $lession_takes = ClassSession::where('class_id', $class->id)
                            ->where('type', 'term')
                            ->count();
                        $record = [
                            'term_id' => $class->id,
                            'name' => $class->name,
                            'students' => count($class->termStudents),
                            'venue' => $class->venue?->name,
                            'class' => $class->class?->name,
                            'class_color' => $class->class?->color,
                            'timing' => $class->timing?->getName(),
                            'total_lesson' => $class->no_of_class,
                            'remaining_lesson' => $class->no_of_class - $lession_takes,
                            'type' => 'term',
                            'date' => date('M d,Y', strtotime($request->date)),
                        ];
                        $records[] = $record;
                    }
                }
            }
        }
        foreach ($terms as $class) {
            foreach ($class->termBaseBookingPackages as $package) {
                if ($class->checkClassByDate($request->date)) {
                    if (count($package->packageStudents) != 0) {
                        if ($class->attandanceDayTrainerCheck($day)) {
                            $current_date = Carbon::now();
                            $package_lession_takes = ClassSession::where('class_id', $package->id)
                                ->where('type', 'package')
                                ->count();
                            $record = [
                                'term_id' => $package->id,
                                'name' => $package->name,
                                'students' => count($package->packageStudents),
                                'venue' => $class->venue?->name,
                                'class' => $class->class?->name,
                                'class_color' => $class->class?->color,
                                'timing' => $class->timing?->getName(),
                                'total_lesson' => $package->no_of_class,
                                'remain_lesson' => $package->no_of_class,
                                'remaining_lesson' => $package->no_of_class - $package_lession_takes,
                                'type' => 'package',
                                'date' => date('M d,Y', strtotime($request->date)),
                            ];
                            $records[] = $record;
                        }
                    }
                }
            }
        }
        return $records;
    }
    public function  gradingSessions($request)
    {
        $terms = TermBaseBooking::where('trainer_id', $request->user_id)->get();
        
        $records = [];
        foreach ($terms as $class) {
            if (count($class->termStudents) != 0) {
                $current_date = Carbon::now();
                $lession_takes = ClassSession::where('class_id', $class->id)
                    ->where('type', 'term')
                    ->count();
                $record = [
                    'term_id' => $class->id,
                    'name' => $class->name,
                    'students' => count($class->termStudents),
                    'venue' => $class->venue?->name,
                    'class' => $class->class?->name,
                    'class_color' => $class->class?->color,
                    'timing' => $class->timing?->getName(),
                    'total_lesson' => $class->no_of_class,
                    'remaining_lesson' => $class->no_of_class - $lession_takes,
                    'type' => 'term',
                    'date' => $current_date->format('d M y'),
                ];
                $records[] = $record;
            }
        }
        foreach ($terms as $class) {
            foreach ($class->termBaseBookingPackages as $package) {
                if (count($package->packageStudents) != 0) {
                    $current_date = Carbon::now();
                    $package_lession_takes = ClassSession::where('class_id', $package->id)
                        ->where('type', 'package')
                        ->count();
                    $record = [
                        'term_id' => $package->id,
                        'name' => $package->name,
                        'students' => count($package->packageStudents),
                        'venue' => $class->venue?->name,
                        'class' => $class->class?->name,
                        'class_color' => $class->class?->color,
                        'timing' => $class->timing?->getName(),
                        'total_lesson' => $package->no_of_class,
                        'remain_lesson' => $package->no_of_class,
                        'remaining_lesson' => $package->no_of_class - $package_lession_takes,
                        'type' => 'package',
                        'date' => $current_date->format('d M y'),
                    ];
                    $records[] = $record;
                }
            }
        }
        return $records;
    }
    public function  assessmentSessions($request)
    {
        $terms = TermBaseBooking::where('trainer_id', $request->user_id)->get();
        $records = [];
        foreach ($terms as $class) {
            if (count($class->termStudents) != 0) {
                $current_date = Carbon::now();
                $lession_takes = ClassSession::where('class_id', $class->id)
                    ->where('type', 'term')
                    ->count();
                $record = [
                    'term_id' => $class->id,
                    'name' => $class->name,
                    'students' => count($class->termStudents),
                    'venue' => $class->venue?->name,
                    'class' => $class->class?->name,
                    'class_color' => $class->class?->color,
                    'timing' => $class->timing?->getName(),
                    'total_lesson' => $class->no_of_class,
                    'remaining_lesson' => $class->no_of_class - $lession_takes,
                    'type' => 'term',
                    'date' => $current_date->format('d M y'),
                ];
                $records[] = $record;
            }
        }
        foreach ($terms as $class) {
            foreach ($class->termBaseBookingPackages as $package) {
                if (count($package->packageStudents) != 0) {
                    $current_date = Carbon::now();
                    $package_lession_takes = ClassSession::where('class_id', $package->id)
                        ->where('type', 'package')
                        ->count();
                    $record = [
                        'term_id' => $package->id,
                        'name' => $package->name,
                        'students' => count($package->packageStudents),
                        'venue' => $class->venue?->name,
                        'class' => $class->class?->name,
                        'class_color' => $class->class?->color,
                        'timing' => $class->timing?->getName(),
                        'total_lesson' => $package->no_of_class,
                        'remain_lesson' => $package->no_of_class,
                        'remaining_lesson' => $package->no_of_class - $package_lession_takes,
                        'type' => 'package',
                        'date' => $current_date->format('d M y'),
                    ];
                    $records[] = $record;
                }
            }
        }
        return $records;
    }
    public function  studentProfile($request)
    {
        $student = Student::find($request->student_id);
        $assesment_request = AssessmentRequest::where('student_id', $request->student_id)->first();
        $student_terms = StudentTerm::where('student_id', $request->student_id)->get();
        $class_sessions = ClassSession::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_gradings = ClassGrading::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))->get();
        $class_assessments = ClassAssessment::whereIn('class_id', $student_terms->pluck('term_id'))
            ->whereIn('type', $student_terms->pluck('type'))
            ->get();
        $attendance_records = [];
        $grading_records = [];
        $assessment_records = [];

        // student attandance record get
        foreach ($class_sessions as $item) {
            $term_attendance = $student_terms
                ->where('term_id', $item->class_id)
                ->where('type', $item->type)
                ->first();
            $student_term_active = $student_terms
                ->where('student_id', $student->id)
                ->where('status', 'on')
                ->first();
            $attendance = $item?->sessionAttendance?->where('student_id', $student_term_active?->student_id)->first();
            $venue_attandance = $term_attendance?->status != 'off' ? $item->venueName() : 'Previous Venue' . ':' . $item->venueName();
            $attendance_record = [
                'id' => $item->id,
                'name' => $item->term?->name,
                'trainer_name' => $item->trainer?->first_name . ' ' . $item->trainer?->last_name,
                'venue' => $venue_attandance,
                'date' => date('M d,Y', strtotime($item->date)),
                'day' => date('l', strtotime($item->date)),
                'time' => date('h:i A', strtotime($item->created_at)),
                'status' => $attendance?->status,
                'reason' => $attendance?->late,
            ];
            $attendance_records[] = $attendance_record;
        }
        // end student attandance record

        // student grading record get
        foreach ($class_gradings as $class_grading) {
            $term_grading = $student_terms?->where('term_id', $class_grading->class_id)
                ->where('type', $class_grading->type)
                ->first();
            $student_term_active = $student_terms
                ->where('student_id', $student->id)
                ->where('status', 'on')
                ->first();
            $grading = $class_grading?->gradings?->where('student_id', $student_term_active?->student_id)->first();
            $venue_attandance = $term_grading?->status != 'off' ? $class_grading?->venueName() : 'Previous Venue' . ':' . $class_grading?->venueName();
            $grading_record = [
                'id' => $class_grading->id,
                'name' => $class_grading->term?->name,
                'trainer_name' => $class_grading->trainer?->first_name . ' ' . $class_grading->trainer?->last_name,
                'venue' => $venue_attandance,
                'date' => date('M d,Y', strtotime($class_grading->date)),
                'day' => date('l', strtotime($class_grading->date)),
                'time' => date('h:i A', strtotime($class_grading->created_at)),
                'status' => $grading?->status,
                'remarks' => $grading?->remarks,
            ];
            $grading_records[] = $grading_record;
        }
        // student assessment record get
        foreach ($class_assessments as $class_assessment) {
            $term_assessment = $student_terms
                ->where('term_id', $class_assessment->class_id)
                ->where('type', $class_assessment->type)
                ->first();
            $student_term_active = $student_terms
                ->where('student_id', $student->id)
                ->where('status', 'on')
                ->first();
            $assessment = $class_assessment?->assessmentStudent?->where('student_id', $student_term_active?->student_id)->first();
            $venue_attandance = $term_grading?->status != 'off' ? $class_assessment?->venueName() : 'Previous Venue' . ':' . $class_assessment?->venueName();
            $assessment_record = [
                'id' => $class_assessment->id,
                'name' => $class_assessment->term?->name,
                'trainer_name' => $class_assessment->trainer?->first_name . ' ' . $class_assessment->trainer?->last_name,
                'venue' => $venue_attandance,
                'date' => date('M d,Y', strtotime($class_assessment->date)),
                'day' => date('l', strtotime($class_assessment->date)),
                'time' => date('h:i A', strtotime($class_assessment->created_at)),
                'message' => $assessment?->message,
                'assesment' => $assessment?->studentAssessmentApi(),
            ];
            $assessment_records[] = $assessment_record;
        }
        // end student assessment record
        return [
            'student_id' => $student?->id,
            'student_name' => $student?->name,
            'swim_code' => $student?->swim_code,
            'medical_information' => $student?->medical_information,
            'emergency_no' => $student?->country_code . $student?->contact_no,
            'dob' => date('M d,Y', strtotime($student?->dob)),
            'student_image' => env('APP_IMAGE_URL') . 'student/' . $student?->image,
            'attandances' => $attendance_records,
            'studentGradings' => $grading_records,
            'assessments' => $assessment_records,
        ];
    }
}
