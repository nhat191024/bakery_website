<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class EventLog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'events';

    protected $fillable = [
        'session_id',
        'type',        // add_to_cart, apply_voucher
        'data',        // mảng thao tác chi tiết
        'created_at',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'data'       => 'array',
    ];
}
