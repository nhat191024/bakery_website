<?php

namespace App\Service\admin;

use App\Models\Bills;

class BillService
{
    public function getAll()
    {
        $branch = Bills::all();
        return $branch;
    }

    public function getById($id) {
        return Bills::where('id', $id)->first();
    }

    public function updateStatus($id, $status)
    {
        $method = Bills::where('id', $id)->first();
        $method->status = $status;
        $method->save();
    }
}
