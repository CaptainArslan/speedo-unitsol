<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_id',
        'employee_schedule_id',
    ];
}
