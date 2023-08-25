<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['class_name', 'no_of_student', 'swimming_class_id', 'venue_id', 'package_id', 'user_id', 'trainer_id', 'start_date', 'end_date'];

    protected $cast = [];

    protected $appends = [
        'package_fee', 'timing', 'time_difference'
    ];


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    public function subscription()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function class()
    {
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id');
    }
    public function days()
    {
        return $this->hasMany(ScheduleDays::class);
    }
    public function dayNames()
    {
        $record = [];
        foreach ($this->days as $data) {
            $record[] = $data->day->name;
        }
        return $record;
    }
    public function getPackageFeeAttribute()
    {
        return   $this->subscription->price;
    }

    public function getTimingAttribute()
    {
        return   $this->subscription->timing;
    }

    public function getTimeDifferenceAttribute()
    {
        $timeDifference = Carbon::parse($this->timing->end_time)->diffInMinutes(Carbon::parse($this->timing->start_time));
        return   round($timeDifference, 2);
    }
}
