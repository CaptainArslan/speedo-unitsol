<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetial extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'product_id',
        'student_id',
        'name',
        'type',
        'qty',
        'price',
        'size',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    // public function user(){
    //     return $this->hasManyThrough(Order::class, 'order_');
    // }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function term()
    {
        return $this->belongsTo(TermBaseBooking::class, 'product_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(TermBaseBookingPackage::class, 'product_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function studentTerms()
    {
        return $this->hasMany(StudentTerm::class, 'order_detial_id', 'id');
    }
    public function studentTermsActive()
    {
        return $this->hasOne(StudentTerm::class, 'order_detial_id', 'id')->where('status', 'on');
    }

    public function bookingName()
    {
        if ($this->type == 'term') {
            $name = $this->term ? $this->term->name : '';
        } else {
            $name = $this->package ? $this->package->name : '';
        }
        return  "<span class='badge badge-dot badge-primary'>$name</span>";
    }
    public function getPrice()
    {
        if ($this->type == 'term') {
            $price = $this->price;
        } else {
            $price = $this->price;
        }
        return  "<span class='badge badge-primary ml-2 text-white'>AED $price</span>";
    }

    public function getStatus()
    {
        if ($this->type == 'term') {
            $status = 'Paid';
        } else {
            $status = 'Paid';
        }
        return  "<span class='badge badge-success ml-2 text-white'>$status</span>";
    }
    
    public function getOrderStatus()
    {
        $status = $this->order->payment_status;
        if ($status == 'paid') {
            $status = "<span class='badge badge-success ml-2 text-white'>$status</span>";
        } else {
            $status = "<span class='badge badge-danger ml-2 text-white'>$status</span>";
        }
        return $status;
    }

    public function customerName()
    {
        if ($this->type == 'term') {
            $user = $this->order?->user;
            $first = substr($user?->first_name, 0, 1);
            $last = substr($user?->last_name, 0, 1);
        } else {
            $user = $this->order?->user;
            $first = substr($user?->first_name, 0, 1);
            $last = substr($user?->last_name, 0, 1);
        }
        return " <div class='user-card'>
                    <div class='user-avatar bg-dim-primary d-none d-sm-flex'>
                        <span>$first$last</span>
                         </div>
                      <div class='user-info'>
                      <span class='tb-lead'>$user?->first_name $user?->last_name <span
                   </div>
                  </div>";
    }
    public function productName()
    {
        $user = $this->order->user;
        $name = $this->product?->name;
        $image_name = env('APP_IMAGE_URL') . 'product/' . $this->product?->getFirstImage();
        return
            "<div class='row'>
                <div class='col-1'>
                    <span class='badge badge-primary'>$this->qty</span>
                </div>
                <div class='col-2'>
                    <div class='user-avatar sq'>
                        <img src='$image_name'
                            alt='' class='thumb'>
                    </div>
                </div>
                <div class='col-6'>
                    <strong>$name</strong>
                </div>
            </div> ";
    }
    public function productCustomer()
    {
        $user = $this->order->user;
        $image = asset('admin-assets/images/avatar/b-sm.jpg');
        return
            "<div class='row'>
             <div class='col-4'>
                <div class='user-avatar'>
                    <img src='$image' alt=''>
                </div>
            </div>
            <div class='col-6'>
                <strong>$user->first_name $user->last_name</strong>
            </div>
        </div>";
    }
    public function productPrice()
    {
        $price = $this->price;
        return  "<span class='badge badge-primary ml-2 text-white'>AED $price</span>";
    }
    public function productStatus()
    {
        $status = 'Sold';
        return  "<span class='badge badge-success ml-2 text-white'>$status</span>";
    }

    public function scopeByVenue($query, $venue_id)
    {
        if (isset($venue_id)) {
            $query->whereHas('studentTerms.term', function ($q) use ($venue_id) {
                $q->where('venue_id', $venue_id);
            });
        }
        return  $query;
    }

    /**
     * Scope a query get class who have term.
     *
     * @param Builder $query
     * @param string $class_id is the swimming_class_id in term table
     * @return Builder
     */
    public function scopeByClass($query, $class_id)
    {
        if (isset($class_id)) {
            $query->whereHas('studentTerms.term', function ($q) use ($class_id) {
                $q->where('swimming_class_id', $class_id);
            });
        }
        return  $query;
    }
}
