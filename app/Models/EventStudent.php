<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventStudent extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['event_id', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
