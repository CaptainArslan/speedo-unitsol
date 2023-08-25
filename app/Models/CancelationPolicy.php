<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CancelationPolicy extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title', 'pdf', 'content', 'user_id'];
}
