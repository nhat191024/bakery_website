<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
        'user_id',
        'product_id',
        'description',
        'start_time',
        'end_time',
        'discount_percentage',
        'discount_amount',
        'discount_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
