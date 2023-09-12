<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SwimmingClass extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'user_id', 'no_of_student', 'age_group', 'color', 'status', 'price'];

    public const ACTIVE = 'Active';

    /**
     * Get the calss images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function getStatus()
    {
        return $this->status == 'Active' ? "<span class='badge badge-success ml-2 text-white'>Active</span>"
            : "<span class='badge badge-warning ml-2 text-white'>de Active</span>";
    }
}
