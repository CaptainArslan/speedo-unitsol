<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'student_id',
        'swimming_class_id',
        'discount',
        'till_date',
        'status',
        'status_date',
        'dismiss',
        'is_approved',
    ];
    public function getStatus()
    {
        return $this->status == 'Enroll Now' ? "<span class='badge badge-success ml-2 text-white'>Enrolled</span>"
            : "<span class='badge badge-warning ml-2 text-white'>$this->status</span>";
    }
    public function getStatusList()
    {

        $id =  $this->id;
        $student_id =  $this->student_id;
        $active = '';
        $call_back = '';
        $follow_1 = '';
        $follow_2 = '';
        $enroll = '';
        $lost = '';
        if ($this->status === 'Active') {
            $active = 'selected';
        }
        if ($this->status === 'Call back requested') {
            $call_back = 'selected';
        }
        if ($this->status === 'Follow up 1') {
            $follow_1 = 'selected';
        }
        if ($this->status === 'Follow up 2') {
            $follow_2 = 'selected';
        }
        if ($this->status === 'Enroll Now') {
            $enroll = 'selected';
        }
        if ($this->status == 'Lost') {
            $lost = 'selected';
        }
        return "
        <select name='status' style='width:200px'
                // onchange='changeStatus(event,$id,$student_id)'
                required class='form-select2 form-control' data-search='on'>
                <option value=''>Change Status</option>
                <option value='Active' $active >Active</option>
                <option value='Call back requested' $call_back >Call back requested</option>
                <option value='Follow up 1' $follow_1 >Follow up 1</option>
                <option value='Follow up 2' $follow_2 >Follow up 2</option>
                <option value='Enroll Now' $enroll >Enrolled</option>
                <option value='Lost' $lost >Lost</option>
        </select>
        ";
    }
    public function getParentEmail()
    {
        return  "<span class='badge badge-warning ml-2 text-white'>" . $this->parent?->country_code . $this->parent?->contact_number . "</span>
        <br><span class='badge badge-success ml-2 text-white'>" . $this->parent?->email . "</span>
        ";
    }
    public function getClassAndName()
    {
        return  $this->student?->name . ' ' . $this->student?->last_name . "
        <br><span class='badge badge-success ml-2 text-white'>" . $this->class?->name . "</span>
        ";
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function class()
    {
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id');
    }
}
