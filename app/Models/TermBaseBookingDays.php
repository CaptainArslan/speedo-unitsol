<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermBaseBookingDays extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'term_base_booking_id',
        'day_id',
    ];
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }
}
