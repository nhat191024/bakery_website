<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'real_price',
        'fake_price',
        'image',
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function promotions()
    {
        return $this->hasMany(Promotions::class, 'product_id');
    }

    public function bill_details()
    {
        return $this->hasMany(Bill_details::class, 'product_id');
    }
}
