<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function emirate(){
        return $this->belongsTo(Emirate::class, 'emirate_id');
    }
}