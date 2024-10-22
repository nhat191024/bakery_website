<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'variations';
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function product_variation()
    {
        return $this->hasMany(Product_variation::class, 'variation_id');
    }
}
