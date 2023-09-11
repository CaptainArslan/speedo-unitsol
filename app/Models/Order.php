<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'discount',
        'type',
        'tax',
    ];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetial::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getStudentNames()
    {
        // $name = '';
        $name_array = [];
        foreach ($this->orderDetail as $item) {
            foreach ($item->studentTerms->where('status', 'on') as $student_term) {
                $name_array[] = $student_term?->student->name;
                // $name .= $student_term->student ? $student_term->student->name.','  : '';
            }
        }
        $name = array_unique($name_array);
        // dd($name);
        return implode(',', $name);
        // return $name;
    }
    public function getTotal()
    {
        $sub_total = 0;
        foreach ($this->orderDetail as $item) {
            $sub_total += $item->price * $item->qty;
        }
        return 'AED ' . $sub_total + $this?->tax - $this->discount;
    }
    public function getTermName()
    {
        // $term_name = '';
        $term_array = [];
        foreach ($this->orderDetail as $item) {
            $term_array[] = $item->name;
            // $term_name .= $item->name . ',';
        }
        $term_name = array_unique($term_array);
        return implode(',', $term_name);
    }
}
