<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grading extends Model
{
    use HasFactory,SoftDeletes;
   
    protected $fillable=[
        'class_grading_id',
        'student_id',
        'status',
        'remarks',
    ];
    public function getGrade(){
        $class_name='';
        if($this->status == 'Pass'){
            $class_name='btn-outline-success';
        }else{
            $class_name='btn-outline-danger';
        }
        return $class_name;
    }
}
