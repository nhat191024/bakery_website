<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_details extends Model
{
    protected $table = 'bill_details';

    protected $fillable = [
        'product_id',
        'bill_id',
        'variation_id',
        'quantity',
        'price',
    ];

    public function Products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }
}
