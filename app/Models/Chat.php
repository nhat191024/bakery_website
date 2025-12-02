<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chats';

    protected $fillable = [
        'session_id',
        'name',
        'phone',
        'status',
        'created_at',
    ];

    public $timestamps = false; // vì ta dùng created_at tự set

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'chat_id');
    }
}
