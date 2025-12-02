<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;   // <-- namespace mới

class TestMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'test_collection';

    protected $fillable = ['name', 'created_at'];
}
