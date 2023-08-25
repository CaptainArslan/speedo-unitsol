<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'venue_id', 'annual_fee', 'fee_paid_date', 'register_as_student_id', 'discount', 'term_condition', 'credit', 'image', 'swim_code', 'nick_name', 'name', 'dob', 'country_code', 'school', 'medical_information', 'contact_no', 'relation', 'gender'];

    public function getAge()
    {
        $data = Carbon::createFromDate($this->dob)->diff(Carbon::now());
        $years = $data->format('%y Year');
        $months = $data->format('%m Months');
        $days = $data->format('%d Days');
        if ($years > 1) {
            return $years . ' ' . $months;
        } else if ($months > 1) {
            return $months;
        } else {
            return $days;
        }
        // return $year;
        // $data->format('%y years, %m months and %d days');
        // return Carbon::parse($this->dob)->age;
    }
    public function getFeeDate()
    {
        $data = Carbon::createFromDate($this->fee_paid_date)->diff(Carbon::now());
        $years = $data->format('%y');
        return $years;
        // $data->format('%y years, %m months and %d days');
        // return Carbon::parse($this->dob)->age;
    }
    public function studentName()
    {
        $name = $this->name;
        return  "<span class='badge badge-dot badge-primary'>$name</span>";
    }
    public function getFullName()
    {
        return  $this->name . ' ' . $this->last_name;
    }
    public function getStudentImage()
    {
        $student_image_url = env('APP_IMAGE_URL') . 'student/' . $this->image;
        $image = asset('parent-assets/images/avatar/avt.jpeg');
        if ($this->image) {
            return "<img src=' $student_image_url' style='width: 110px !important;height:50px;object-fit: contain;border-radius: 10px'>";
        } else {
            return "<img src=' $image ' style='width: 110px !important;height:50px;border-radius: 10px'>";
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    public function orderDetails()
    {

        return $this->hasMany(OrderDetial::class, 'student_id', 'id')->where('student_id', '!=', $this->id);
    }
    public function assessmentRequest()
    {
        return $this->hasOne(AssessmentRequest::class, 'student_id');
    }
}
