<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermBaseBooking extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'term_id',
        'trainer_id',
        'venue_id',
        'swimming_class_id',
        'class_type_id',
        'name',
        'total',
        'no_of_class',
        'no_of_student',
        'start_date',
        'end_date',
        'discount',
        'timing_id',
        'parent_id',
        'blackout_check',
        'blackout_start_date',
        'blackout_end_date',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'trainer_id', 'id')->withTrashed();
    }
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_id', 'id')->withTrashed();
    }
    public function class()
    {
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id', 'id')->withTrashed();
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id')->withTrashed();
    }
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'id');
    }
    public function classType()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id', 'id');
    }
    public function tranierDetails()
    {
        return $this->hasMany(TermBaseBooking::class, 'parent_id', 'id');
        // return $this->hasMany()
    }
    public function termBaseBookingDays()
    {
        return $this->hasMany(TermBaseBookingDays::class);
    }

    public function termBaseBookingDaysParent()
    {
        return $this->hasMany(TermBaseBookingDays::class, 'term_base_booking_id', 'parent_id');
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetial::class, 'product_id', 'id')->where('type', 'term');
    }
    public function studentTerms()
    {
        return $this->hasMany(StudentTerm::class, 'term_id', 'id')->where('type', 'term');
    }
    public function termBaseBookingPackages()
    {
        return $this->hasMany(TermBaseBookingPackage::class, 'term_base_booking_id', 'id');
    }
    public function termBaseBookingPackagesParent()
    {
        return $this->hasMany(TermBaseBookingPackage::class, 'term_base_booking_id', 'parent_id');
    }
    public function dayId()
    {
        $record = [];
        foreach ($this->termBaseBookingDaysParent as $data) {
            $record[] = $data->day_id;
        }
        return $record;
    }
    public function dayNames()
    {
        $record = '';
        foreach ($this->termBaseBookingDaysParent as $data) {
            $record .= $data->day->name . ',';
        }
        return $record;
    }
    public function fillterDayNames()
    {
        $days = [];
        foreach ($this->termBaseBookingDaysParent as $data) {
            $days[] = $data->day->name;
        }

        return $days;
    }
    public function dayNames2()
    {
        $record = '';
        foreach ($this->termBaseBookingDays as $data) {
            $record .= $data->day?->name . ',';
        }
        return $record;
    }

    public function getAttributeStartDate($value)
    {
        return $value->format('M d,Y');
    }
    public function getAttributeEndDate($value)
    {
        return $value->format('M d,Y');
    }
    public function getTimeDifferenceAttribute()
    {
        $timeDifference = Carbon::parse($this->timing?->end_time)->diffInMinutes(Carbon::parse($this->timing?->start_time));
        return   round($timeDifference, 2);
    }
    public function scopeByClass($query, $class)
    {
        if (isset($class)) {
            return  $query->whereIn('swimming_class_id', $class);
        }
        return $query;
    }
    public function scopeByOneClass($query, $class)
    {
        if (isset($class)) {
            return  $query->where('swimming_class_id', $class);
        }
        return $query;
    }
    public function scopeByVenue($query, $venue)
    {
        if (isset($venue)) {
            return  $query->where('venue_id', $venue);
        }
        return $query;
    }
    public function scopeByTermBaseBooking($query, $term_id)
    {
        if (isset($term_id)) {
            return  $query->whereIn('term_id', $term_id);
        }
        return $query;
    }
    public function scopeByTerm($query, $term_id)
    {
        if (isset($term_id)) {
            return  $query->where('term_id', $term_id);
        }
        return $query;
    }
    public function scopeByStartDate($query, $sDate)
    {
        if (isset($venue)) {
            return  $query->whereRaw('"' . $sDate . '" between `start_date` and `end_date`');
        }
        return $query;
    }
    public function scopeByEndDate($query, $eDate)
    {
        if (isset($venue)) {
            return  $query->whereRaw('"' . $eDate . '" between `start_date` and `end_date`');
        }
        return $query;
    }

    // public function scopeByEndDate($query, $end_date)
    // {
    //     if (isset($end_date)) {
    //         $e_date=Carbon::parse($end_date);
    //         return  $query->where('end_date', '>=', $e_date->format('Y-m-d'));
    //     }
    //     return $query;
    // }
    public function scopeByClassType($query, $class_type)
    {
        if (isset($class_type)) {
            return  $query->whereIn('class_type_id', $class_type);
        }
        return $query;
    }
    public function scopeByDays($query, $days)
    {
        if (isset($days)) {
            return  $query->whereHas('termBaseBookingDaysParent', function ($q) use ($days) {
                $q->whereIn('day_id', $days);
            });
        }

        return $query;
    }
    public function scopeByDays2($query, $days)
    {
        if (isset($days)) {
            return  $query->whereHas('termBaseBookingDays', function ($q) use ($days) {
                $q->whereIn('day_id', $days);
            });
        }

        return $query;
    }
    public function scopeByTimings($query, $timing)
    {
        if (isset($timing)) {
            return  $query->whereIn('timing_id', $timing);
        }
        return $query;
    }
    public function scopeByEmployee($query, $employee)
    {
        if (isset($employee)) {
            return  $query->where('trainer_id', $employee);
        }
        return $query;
    }
    public function countDays($start_date)
    {
        $days = [];
        $now = Carbon::now();
        if (Carbon::createFromDate($start_date) <= $now) {
            $period = CarbonPeriod::create($now, $this->end_date);
            $dates = $period->toArray();
            foreach ($dates as $date) {
                $days[] = $date->format('l');
            }
        }
        return $days;
    }
    public function getTotal($days)
    {
        $filtered = $days->filter(function ($day) {
            $total_days = [];
            foreach ($this->fillterDayNames() as $key => $value) {
                if ($value == $day) {
                    $total_days[] = $value;
                }
            }
            return $total_days;
        });
        if ($filtered != []) {
            $term_price = $this?->class->price;
            $price = count($filtered) * $term_price;
            $discount_price = $this->discount != 0 ? ($price * $this->discount) / 100 : 0;
            $total = $price - $discount_price;
        } else {
            $total = $this->total;
        }
        return $total;
    }
    public function getNumberOfClass($days)
    {
        $filtered = $days->filter(function ($day) {
            $total_days = [];
            foreach ($this->fillterDayNames() as $key => $value) {
                if ($value == $day) {
                    $total_days[] = $value;
                }
            }
            return $total_days;
        });

        return $filtered != [] ? count($filtered) : $this->no_of_class;
    }
    public function getBookedTerm($student_id)
    {
        $booked_term = null;
        if ($student_id != []) {
            $booked_term = StudentTerm::where('term_id', $this->id)
                ->where('type', 'term')
                ->whereIn('student_id', $student_id)
                ->first();
        }
        return $booked_term;
    }
    public function getDate()
    {
        return   ' ' . date('F d, Y', strtotime($this->start_date)) . ' - ' . date('F d, Y', strtotime($this->end_date));
    }
    public function getTrainerList()
    {
        // dd($this);
        $record = '';
        foreach ($this->tranierDetails as $data) {

            $record .= '
            <tr>    
                <td>' . $data->user?->first_name . ' ' . $data->user?->last_name . '</td>
                <td>' . $data->venue?->name . '</td>
                <td>' . $data->timing?->getName() . '</td>
            </tr>';
            // dd($record);
        }
        // dd(2);
        return "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Trainer</th>
                        <th>Venue</th>
                        <th>Timing</th>
                    </tr>
                </thead>
                <body>
                    $record
                </body>
               
      </table>";
    }

    public function termPackages()
    {
        $record = '';
        foreach ($this->termBaseBookingPackages as $data) {
            $record .= '
            <tr>    
                <td>' . $data->name . '</td>
                <td>' . $data->start_date . '</td>
                <td>' . $data->end_date . '</td>
                <td>' . $data->no_of_class . '</td>
                <td><a href="' . url('admin/class-schedules/' . $data->id . '?q=2') . '" class="toggle" data-target="editClass"><em
                class="icon ni ni-eye"></em><span>View</span></a></td>
            </tr>';
            // dd($record);
        }
        // dd(2);
        return "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Lessons</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <body>
                    $record
                </body>
               
      </table>";
    }
    public function termStudents()
    {
        return $this->hasMany(StudentTerm::class, 'term_id', 'id')->where('type', 'term')->where('status', 'on');
    }

    // get terms for trainer attandance
    public function terms()
    {
        return $this->hasMany(TermBaseBooking::class, 'parent_id', 'id');
    }

    // check if current day class exit in term base booking
    public function attandanceDays()
    {
        $record = "";
        $current_day = Carbon::now();
        foreach ($this->termBaseBookingDaysParent as $day) {
            if ($current_day->format('l') == $day->day->name) {
                $record .= $day->day->name;
            }
        }
        return $record;
    }
    // check class avaiable current date between start date to end date
    public function checkDate()
    {
        if (Carbon::now()->between(Carbon::parse($this->start_date), Carbon::parse($this->end_date))) {
            return true;
        }
        return false;
    }
    public function checkClassByDate($date)
    {
        if (Carbon::parse($date)->between(Carbon::parse($this->start_date), Carbon::parse($this->end_date))) {
            // dd($date);
            return true;
        }
        return false;
    }

    public function tolalSlotBooked()
    {
        $term_book_slot = 0;
        $package_book_slot = 0;
        foreach ($this->studentTerms->where('status', 'on') as $data) {
            $term_book_slot += $data->qty;
        }
        foreach ($this->termBaseBookingPackages as $term_package) {
            foreach ($term_package->studentTerms->where('status', 'on') as $data) {
                $package_book_slot += $data->qty;
            }
        }
        $total_slot = $term_book_slot + $package_book_slot;
        return $total_slot;
    }
    public function className()
    {
        if ($this->type == 'term') {
            $name = $this->class ? $this->class->name : '';
        } else {
            $name = $this->package ? $this->package->name : '';
        }
        return  "<span class='badge badge-dot badge-primary'>$name</span>";
    }
    public function getClass()
    {
        if ($this->type == 'term') {
            $id = $this->term ? $this->term?->class->id : '';
        } else {
            $id = $this->package ? $this->package->term?->class->id : '';
        }
        return $id;
    }
    // mange booking trainer fiter check class
    public function attandanceDayTrainerCheck($day)
    {
        $record = "";
        $current_day = Carbon::now();
        foreach ($this->termBaseBookingDaysParent as $data) {
            if ($day == $data->day->name) {
                $record .= $data->day->name;
            }
        }
        return $record;
    }

    public function getTermDays($term)
    {
        $daysHtml = '';
        if (!empty($term) && $term->termBaseBookingDays->count() > 0) {
            $days = $term->termBaseBookingDays->pluck('name')->toArray();
            $daysHtml = implode(', ', $days);
        }
        return $daysHtml;
    }
}
