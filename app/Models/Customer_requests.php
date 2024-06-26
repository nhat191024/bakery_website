<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_requests extends Model
{
    protected $table = 'customer_requests';

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'message',
        'status',
    ];
}
