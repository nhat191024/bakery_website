<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'delivery_method',
        'payment_method',
        'total_amount',
        'status',
    ];

    public function bill_details()
    {
        return $this->hasMany(Bill_details::class, 'bill_id');
    }
}
