<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address'
    ];
}
