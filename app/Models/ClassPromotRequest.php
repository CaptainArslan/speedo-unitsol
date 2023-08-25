<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassPromotRequest extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'user_id',
        'student_id',
        'term_id',
        'swimming_class_id',
        'type',
        'status',
    ];
    public function trainer(){
        return $this->belongsTo(User::class, 'user_id');
    }
     public function class(){
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id');
    }
     public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    } 
    public function term(){
        return $this->belongsTo(TermBaseBooking::class, 'term_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(TermBaseBookingPackage::class, 'term_id', 'id');
    }
    public function bookingName(){
        if($this->type == 'term'){
            $name = $this->term?$this->term->name:'' ;
        }else{
            $name = $this->package?$this->package->name:'' ;
        }
        return  "<span class='badge badge-dot badge-primary'>$name</span>";
    }
    public function venueName(){
        if($this->type == 'term'){
            $name = $this->term?->venue?$this->term?->venue->name:'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->venue->name : '';
        }
        return $name;
    }
    public function getStatus()
    {
        return $this->status == 'accepted' ? "<span class='badge badge-success ml-2 text-white'>Accept</span>"
        : "<span class='badge badge-warning ml-2 text-white'>Waiting</span>";
    }
}
