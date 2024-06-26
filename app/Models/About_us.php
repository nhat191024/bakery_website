<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
    ];
}
