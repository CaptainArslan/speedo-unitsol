<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassAssessment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'user_id',
        'class_id',
        'type',
        'date',
    ];
    public function assessmentStudent(){
        return $this->hasMany(AssessmentStudent::class, 'class_assessment_id', 'id');
    }
    public function trainer(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function term(){
        return $this->belongsTo(TermBaseBooking::class, 'class_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(TermBaseBookingPackage::class, 'class_id', 'id');
    }
    public function venueName(){
        if($this->type == 'term'){
            $name = $this->term?->venue?$this->term?->venue->name:'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->venue->name : '';
        }
        return $name;
    }
    public function classId(){
        if($this->type == 'term'){
            $name = $this->term ? $this->term?->class->id : '';
        }else{
            $name = $this->package?->term ? $this->package->term?->class->id : '';
        }
        return $name;
    }
    public function bookingName(){
        if($this->type == 'term'){
            $name = $this->term?$this->term->name:'' ;
        }else{
            $name = $this->package?$this->package->name:'' ;
        }
        return  $name;
    }
}

