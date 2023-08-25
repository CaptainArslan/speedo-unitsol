<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermBaseBookingPackage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'term_base_booking_id',
        'name',
        'start_date',
        'end_date',
        'no_of_class',
        'price',
        'total',
    ];
    public function term()
    {
        return $this->belongsTo(TermBaseBooking::class, 'term_base_booking_id', 'id');
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetial::class, 'product_id', 'id')->where('type', 'package');
    }
    public function studentTerms()
    {
        return $this->hasMany(StudentTerm::class, 'term_id', 'id')->where('type', 'package');
    }
    // get packages for trainer attandance
    public function packages(){
        return $this->hasMany(OrderDetial::class, 'parent_id', 'id');
    }
    public function packageStudents(){
        return $this->hasMany(StudentTerm::class, 'term_id', 'id')->where('type', 'package')->where('status','on');
    }
}
