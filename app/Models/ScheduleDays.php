<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleDays extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['day_id', 'schedule_id'];
    
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
}
