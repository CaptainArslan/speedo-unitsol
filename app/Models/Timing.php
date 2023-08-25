<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timing extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id','name', 'start_time', 'end_time'];

    public function getName()
    {
        return $this->name . ' - ' . date('h:i A', strtotime($this->start_time)) . ' - ' . date('h:i A', strtotime($this->end_time));
    }
    public function getTime()
    {
        return  date('h:i A', strtotime($this->start_time)) . ' - ' . date('h:i A', strtotime($this->end_time));
    }
}
