<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['price', 'user_id', 'qty', 'asset_name', 'asset_type_id', 'asset_number', 'venue_id', 'staff_id', 'description', 'status'];

    /**
     * Get the calss images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    public function assetType()
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id');
    }
    public function getPrice()
    {
        return '<span class="badge badge-success ml-2 text-white">AED</span> ' . $this->price;
    }
    public function getlocation()
    {
        return "<a target='_blank' href='$this->asset_location'
        class='toggle btn btn-info d-none d-md-inline-flex'><span>Location</span></a>";
    }
}
