<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermBlackout extends Model
{
    use HasFactory;
    protected $fillable = [
        'term_id',
        'start_date',
        'end_date',
    ];

    // public function getStartDateAttribute($value)
    // {
    //     return date('M d Y', strtotime($value));
    // }
    // public function getEndDateAttribute($value)
    // {
    //     return date('M d Y', strtotime($value));
    // }
}
