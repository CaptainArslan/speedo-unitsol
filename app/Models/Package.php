<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['price','user_id', 'name', 'swimming_class_id', 'timing_id', 'status'];

    public function getStatus()
    {
        return $this->status == 'Active' ? "<span class='badge badge-success ml-2 text-white'>Active</span>"
            : "<span class='badge badge-warning ml-2 text-white'>de Active</span>";
    }
    public function getPrice()
    {
        return '<span class="badge badge-primary ml-2 text-white">$' . $this->price . '</span> ';
    }

    public function swimmingClass()
    {
        return $this->belongsTo(SwimmingClass::class, 'swimming_class_id');
    }
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_id','id');
    }
}
