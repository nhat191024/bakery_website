<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'subtitle',
        'content',
        'thumbnail',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
