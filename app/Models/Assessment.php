<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'user_id',
        'swimming_class_id',
        'name',
        'parent_id',
        'description',
    ];
     public function class(){
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id');
     }

     public function assessmentDetails()
    {
        return $this->hasMany(Assessment::class, 'parent_id','id');
        // return $this->hasMany()
    }

     public function getAssessmentList(){
        // dd($this);
        $record='';
        foreach($this->assessmentDetails as $data){
            
            $record .='
            <tr>    
                <td>'.$data->name.'</td>
                <td>'.$data->description.'</td>
            </tr>';
            // dd($record);
        }
        // dd(2);
        return "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <body>
                    $record
                </body>
               
      </table>";
    }

}
