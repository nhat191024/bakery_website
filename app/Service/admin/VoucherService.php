<?php

namespace App\Service\admin;

use App\Models\Vouchers;

class VoucherService
{
    public function getAll()
    {
        $voucher = Vouchers::all();
        return $voucher;
    }

    public function getById($id)
    {
        return Vouchers::where('id', $id)->first();
    }

    public function add($request)
    {
        $id = Vouchers::create([
            'code' => $request->code,
            'description' => $request->description,
            'discount_amount' => ($request->discount_amount >= 0 ? $request->discount_amount : 0),
            'min_price' => ($request->min_price >= 0 ? $request->min_price : 0),
            'quantity' => ($request->quantity > 0 ? $request->quantity : 1),
            'start_date' => ($request->start_date >= $request->end_date ? $request->end_date : $request->start_date),
            'end_date' => ($request->end_date <= $request->start_date ? $request->start_date : $request->end_date),
            'status' => 1,
        ])->id;
        return $id;
    }

    public function edit($request)
    {
        $voucher = Vouchers::find($request->id);
        $voucher->code = $request->code;
        $voucher->description = $request->description;
        $voucher->discount_amount = ($request->discount_amount >= 0 ? $request->discount_amount : 0);
        $voucher->min_price = ($request->min_price >= 0 ? $request->min_price : 0);
        $voucher->quantity = ($request->quantity > 0 ? $request->quantity : 1);
        $voucher->start_date = ($request->start_date >= $request->end_date ? $request->end_date : $request->start_date);
        $voucher->end_date = ($request->end_date <= $request->start_date ? $request->start_date : $request->end_date);
        $voucher->status = $request->status;
        $voucher->save();
    }

    public function delete($id)
    {
        $voucher = Vouchers::find($id);
        $voucher->delete();
    }
}