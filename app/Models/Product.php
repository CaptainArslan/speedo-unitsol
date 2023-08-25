<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['sale_price', 'user_id','description', 'name', 'sku', 'stock', 'status'];

    /**
     * Get the calss images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    } 
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
     public function getFirstImage()
    {
        $image_name='';
        foreach($this->images->take(1) as $data){
            $image_name=$data->image;
        }

        return $image_name;
    }

    public function getPrice()
    {
        return '<span class="badge badge-dark badge-sm">AED  ' . $this->sale_price . '</span> ';
    }
    public function getStock()
    {
        return '<span class="badge badge-success badge-sm">' . $this->stock . '</span> ';
    }
    public function scopeByName($query, $name)
    {
        if (isset($name)) {
            return  $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }
    public function getProductSizes()
    {
        $record = '';
        foreach ($this->productSizes as $data) {

            $record .= '
            <tr>    
                <td>' . $data->name . '</td>
            </tr>';
        }
        if($record!=''){
            return "<table class='table table-bordered w-25'>
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <body>
                $record
            </body>
           
  </table>";
        }
        
    }
    // public function getProductSizes()
    // {
    //         $record = '';
    //         foreach ($this->productSizes as $data) {
    //             $record.= $data->name.',';
    //         }
    //         return $record;
    // }
}
