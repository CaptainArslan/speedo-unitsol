<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderBalance extends Model
{
    use HasFactory;

    protected $table = 'customer_order_balances';

    protected $fillable = [
        'user_id', 'admin_id', 'order_id', 'balance', 'received_amount', 'payment_type'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

}
