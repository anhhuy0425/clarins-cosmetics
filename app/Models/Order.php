<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'voucher_id',
        'phone',
        'email',
        'shipping_time',
        'address',
        'total_amount',
        'order_detail',
        'payment_method',
        'shipping_rule_id',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

