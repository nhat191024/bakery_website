<?php

namespace App\Service\admin;

use App\Models\Bill;
use App\Models\Bills;
use App\Models\Branch;
use App\Models\CookingMethod;

class BillService
{
    public function getAll()
    {
        $bill = Bills::all();
        return $bill;
    }

    public function getAllByIdBill($billId)
    {
        $billDetailArray = Bills::all()->where('bill_id', $billId);
        return $billDetailArray;
    }

    public function getById($id) {
        return Bills::where('id', $id)->first();
    }
}
