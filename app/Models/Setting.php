<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'buisness_name',
        'buisness_logo',
        'business_address',
        'copyright',
        'main_site',
        'facebook',
        'instagram',
        'maintanance_mode',
        'email',
        'password',
        'smtp_host',
        'smtp_port',
        'smtp_encryption',
        'activity_logs',
        '2_factor_auth',
        'auto_logout',
        'login_alert',

    ];
}
