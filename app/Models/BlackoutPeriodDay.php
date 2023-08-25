<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackoutPeriodDay extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'blackout_period_id'];
}
