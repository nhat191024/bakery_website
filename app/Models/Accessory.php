<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $table = 'accessories';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function accessories()
    {
        return $this->hasMany(Bills::class, 'accessory_id');
    }
}
