<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillAccessory extends Model
{
    protected $table = 'bill_accessories';

    protected $fillable = [
        'bill_id',
        'accessory_id',
    ];

    public function accessories()
    {
        return $this->belongsTo(Accessory::class, 'accessory_id');
    }

    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }
}
