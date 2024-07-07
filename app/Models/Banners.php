<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link',
        'status',
    ];
}
