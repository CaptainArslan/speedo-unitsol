<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id', 'venue_id', 'name', 'start_date', 'start_time', 'end_date', 'end_time', 'google_map_location', 'description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function eventStudents()
    {
        return $this->hasMany(EventStudent::class);
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getlocation()
    {
        return "<a target='_blank' href='$this->google_map_location'
        class='toggle btn btn-info d-none d-md-inline-flex'><span>Location</span></a>";
    }
    public function getStudents()
    {
        $total=count($this->eventStudents);
        return "<span class='badge badge-primary ml-2 text-white'>Participants $total</span>";
    }
}
