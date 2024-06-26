<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'content',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
