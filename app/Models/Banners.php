<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banners extends Model
{
    use SoftDeletes;
    protected $table = 'banners';

    protected $fillable = [
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'image',
        'link',
        'status',
    ];
}
