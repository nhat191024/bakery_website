<?php

namespace App\Service\admin;

use App\Models\Bill_details;
use App\Models\Bills;

class BillService
{
    public function getAll($perPage = 15)
    {
        $branch = Bills::select('id', 'full_name', 'address', 'phone_number', 'created_at', 'total_amount', 'status')
            ->orderBy('status')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
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

    public function getPendingSummary($limit = 5)
    {
        return [
            'count' => Bills::where('status', 0)->count(),
            'bills' => Bills::select('id', 'full_name', 'phone_number', 'order_date')
                ->where('status', 0)
                ->orderBy('order_date', 'desc')
                ->limit($limit)
                ->get(),
        ];
    }

    public function updateStatus($id, $status)
    {
        $method = Bills::where('id', $id)->first();
        $method->status = $status;
        $method->save();
    }
}
