<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'start_date',
        'end_date',
    ];
    public function termBalackouts()
    {
        return $this->hasMany(TermBlackout::class);
    }
    // public function getStartDateAttribute($value)
    // {
    //     return date('M d Y', strtotime($value));
    // }
    // public function getEndDateAttribute($value)
    // {
    //     return date('M d Y', strtotime($value));
    // }

    public function getBlackoutList()
    {
        // dd($this);
        $record = '';
        foreach ($this->termBalackouts as $data) {

            $record .= '
            <tr>    
                <td>' . date('M d Y', strtotime($data->start_date)) .' to '.date('M d Y', strtotime($data->end_date)) . '</td>
            </tr>';
            // dd($record);
        }
        // dd(2);
        return "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Duration</th>
                    </tr>
                </thead>
                <body>
                    $record
                </body>
               
      </table>";
    }
}
