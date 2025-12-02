<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ProductView extends Model
{
    // Nói rõ dùng connection mongodb (config/database.php)
    protected $connection = 'mongodb';

    // Tên collection trong MongoDB
    protected $collection = 'product_views';

    // Các field cho phép gán hàng loạt
    protected $fillable = [
        'session_id',
        'product_id',
        'viewed_at',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];
}
