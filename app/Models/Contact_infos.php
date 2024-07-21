<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_infos extends Model
{
    protected $table = 'contact_infos';
    protected $fillable = [
        'type',
        'name',
    ];
}
