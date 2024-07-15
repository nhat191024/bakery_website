<?php

namespace App\Service\admin;

use App\Models\Bill_details;
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

    public function getAllByIdBill($billId)
    {
        $billDetailArray = Bill_details::where('bill_id', $billId)->get();
        return $billDetailArray;
    }

    public function updateStatus($id, $status)
    {
        $method = Bills::where('id', $id)->first();
        $method->status = $status;
        $method->save();
    }
}
