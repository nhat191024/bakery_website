<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variation extends Model
{
    protected $table = 'product_variations';

    protected $fillable = [
        'variation_id',
        'product_id',
        'price'
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
