<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cakes extends Model
{
    protected $table = 'cakes';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'real_price',
        'higher_price',
        'image',
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotions::class);
    }

    public function bill_details()
    {
        return $this->hasMany(Bill_details::class);
    }
}
