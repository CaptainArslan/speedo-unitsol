<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentTerm extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'order_detial_id',
        'student_id',
        'term_id',
        'type',
        'qty',
        'status',
        'day',
        'no_of_class',
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    } 
    public function term(){
        return $this->belongsTo(TermBaseBooking::class, 'term_id', 'id')->withTrashed();
    }
    public function package()
    {
        return $this->belongsTo(TermBaseBookingPackage::class, 'term_id', 'id')->withTrashed();
    }
    public function orderDetails(){
        return $this->belongsTo(OrderDetial::class, 'order_detial_id');
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
    public function trainerName(){
        if($this->type == 'term'){
            $name = $this->term?->venue ? $this->term?->user?->first_name : '';
        }else{
            $name = $this->package?->term ? $this->package->term?->user?->first_name : '';
        }
        return $name;
    }
    public function venueLocation()
    {
        if($this->type == 'term'){
            $name = $this->term?->venue?$this->term?->venue->google_map_location:'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->venue->google_map_location : '';
        }
        return $name;
    }
    public function getStartDate()
    {
        if($this->type == 'term'){
            $name = $this->term?$this->term?->start_date:'' ;
        }else{
            $name = $this->package ? $this->package?->start_date : '';
        }
        return $name;
    }
    public function getTermDays()
    {
        if($this->type == 'term'){
            $name = $this->term?$this->term->dayNames():'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->dayNames() : '';
        }
        return $name;
    } 
    public function getEndDate()
    {
        if($this->type == 'term'){
            $name = $this->term?$this->term?->end_date:'' ;
        }else{
            $name = $this->package ? $this->package?->end_date : '';
        }
        return $name;
    }
    public function venueId(){
        if($this->type == 'term'){
            $name = $this->term?->venue?$this->term?->venue->id:'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->venue->id : '';
        }
        return $name;
    }
    public function getTime(){
        if($this->type == 'term'){
            $name = $this->term?->timing?$this->term?->dayNames().'('.$this->term?->timing->getName().')':'' ;
        }else{
            $name = $this->package?->term ? $this->package->term?->dayNames() . '(' . $this->package->term?->timing->getName() . ')' : '';
        }
        return $name;
    }
    public function className(){
        if($this->type == 'term'){
            $name = $this->term?$this->term?->name:'' ;
        }else{
            $name = $this->package ? $this->package?->name : '';
        }
        return $name;
    } 
    public function getClassType(){
        if($this->type == 'term'){
            $name = $this->term?$this->term->classType?->name:'' ;
        }else{
            $name = $this->package?->term ? $this->package->term->classType?->name : '';
        }
        return $name;
    } 
    public function getNoOfClasses(){
        if($this->type == 'term'){
            $no_of_class = $this->term?$this->term?->no_of_class:'' ;
        }else{
            $no_of_class = $this->package ? $this->package?->no_of_class : '';
        }
        return $no_of_class;
    } 
    public function getSwimmingClassName(){
        if($this->type == 'term'){
            $name = $this->term?$this->term?->class->name:'' ;
        }else{
            $name = $this->package ? $this->package?->term->class->name : '';
        }
        return $name;
    }
    public function getClass(){
        if($this->type == 'term'){
            $id = $this->term?$this->term?->class->id:'' ;
        }else{
            $id = $this->package ? $this->package->term?->class->id : '';
        }
        return $id;
    }
    public function getStatus()
    {
        return $this->status == 'on' ? "<span class='badge badge-success ml-2 text-white'>On</span>"
            : "<span class='badge badge-warning ml-2 text-white'>Off</span>";
    }

    public function attandanceDays(){
        if($this->type == 'term'){
            $class = $this->term ;
        }else{
            $class =  $this->package->term;
        }
        $record="";
        $current_day=Carbon::now();
        foreach($class->termBaseBookingDaysParent as $day){
            if ($current_day->format('l') == $day->day->name) {
                $record .= $day->day->name;
            }
        }
         return $record;
    }
    // check class avaiable current date between start date to end date
    public function checkDate(){
        if (Carbon::now()->between(Carbon::parse($this->getStartDate()), Carbon::parse($this->getEndDate()))) {
            return true;
        }
        return false;
    }
}
