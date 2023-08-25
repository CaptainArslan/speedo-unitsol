<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class EmployeeSchedule extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'employee_id', 'venue_id', 'start_date', 'end_date', 'start_time', 'end_time'];
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id')->withTrashed();
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }
    public function employeeDays()
    {
        return $this->hasMany(EmployeeDay::class);
    }
    public function dayId()
    {
        $record = [];
        foreach ($this->employeeDays as $data) {
            $record[] = $data->day_id;
        }
        return $record;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
}
