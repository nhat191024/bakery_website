<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_details extends Model
{
    protected $table = 'bill_details';

    protected $fillable = [
        'cake_id',
        'bill_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function cakes()
    {
        return $this->belongsTo(Cakes::class, 'cake_id');
    }

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }
}
