<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReqDoc extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id', 'image', 'emirate_front_img', 'emirate_back_img', 'nda', 'employee_contract', 'employee_image', 'insurance_doc', 'achivement_doc', 'certification_doc'];
}
