<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionAttendance extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'class_session_id',
        'student_id',
        'status',
        'late',
    ];
    public function getClassName(){
        $class_name='';
        if($this->status == 'Present'){
            $class_name='badge-success';
        }else if($this->status == 'Absent'){
            $class_name='badge-danger';
        }else{
            $class_name='badge-warning';
        }
        return $class_name;
    }

    public function getCreatedAtAttribute($date)
    {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
