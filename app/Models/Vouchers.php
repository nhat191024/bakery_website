<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    protected $table = 'vouchers';

    protected $fillable = [
        'code',
        'description',
        'discount_amount',
        'min_price',
        'quantity',
        'start_date',
        'end_date',
        'status'
    ];
}
