<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentStudent extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'class_assessment_id',
        'student_id',
        'message',
    ];
    public function studentAssessmentDetail(){
        return $this->hasMany(StudentAssessmentDetail::class, 'assessment_student_id', 'id');
    }
    
    public function studentAssessment(){
        $record='';
        foreach($this->studentAssessmentDetail as $data){
            $record .='
            <tr>    
                <td>'.$data->assessment->name.'</td>
                <td>'.$data->status.'</td>
            </tr>';
            // dd($record);
        }
        // dd(2);
        return "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <body>
                    $record
                </body>
               
      </table>";
    }
    public function studentAssessmentApi(){
        $records=[];
            foreach($this->studentAssessmentDetail as $data){
                $record =[
                    'name'=>$data->assessment?->name,
                    'status'=>$data->status,
                ];
                $records[]=$record;
            }
        return $records;
    }

    public function getCreatedAtAttribute($date)
    {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
