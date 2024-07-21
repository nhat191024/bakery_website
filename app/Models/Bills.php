<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'order_date',
        'full_name',
        'address',
        'phone_number',
        'email',
        'voucher_code',
        'delivery_method',
        'payment_method',
        'total_amount',
        'accessory_id',
        'status',
    ];

    public function bill_details()
    {
        return $this->hasMany(Bill_details::class, 'bill_id');
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class, 'accessory_id');
    }
}
