<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlackoutPeriod extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'start_date', 'end_date'];
    public function days()
    {
        return $this->hasMany(BlackoutPeriodDay::class);
    }
}
