<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAssessmentDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'assessment_student_id',
        'assessment_id',
        'status',
    ];
    public function assessment(){
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }
}
