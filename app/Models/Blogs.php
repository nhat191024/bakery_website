<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'content',
        'content_en',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
