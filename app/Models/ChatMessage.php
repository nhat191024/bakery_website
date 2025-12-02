<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatMessage extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_messages';

    protected $fillable = [
        'chat_id',
        'sender',      // 'guest' | 'admin'
        'text',
        'created_at',
    ];

    public $timestamps = false;

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
