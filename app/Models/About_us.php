<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'title_en',
        'description',
        'description_en',
        'image',
    ];
}
