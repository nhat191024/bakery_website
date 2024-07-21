<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = 'promotions';
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'fake_price',
        'start_time',
        'end_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
