<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'image', 'user_id', 'google_map_location', 'address', 'status'];

    public function getStatus()
    {
        return $this->status == 'Active' ? "<span class='badge badge-success ml-2 text-white'>Active</span>"
            : "<span class='badge badge-warning ml-2 text-white'>de Active</span>";
    }
    public function getlocation()
    {
        return "<a target='_blank' href='$this->google_map_location'
        class='toggle btn btn-info d-none d-md-inline-flex'><span>Location</span></a>";
    }
    public function getVenueImage()
    {
        $image_url = env('APP_IMAGE_URL') . 'venue/' . $this->image;
        if ($this->image) {
            return "<img src=' $image_url'  class='thumb' style='border-radius: 10px;height:300px !important; width: 100%;'>";
        } else {
            return "<img src=' asset('parent-assets/images/empty-venue.jpeg') ' class='thumb'  style='border-radius: 10px;'>";
        }
    }
}
