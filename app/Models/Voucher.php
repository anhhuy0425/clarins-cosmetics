<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'max_uses',
        'min_order_amount',
        'start_date',
        'expiry_date'
    ];
}
