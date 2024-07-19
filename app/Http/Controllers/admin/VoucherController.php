<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\VoucherService;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    private $voucherService;
    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    public function index()
    {
        $vouchers = $this->voucherService->getAll();
        return view('admin.voucher.voucher', compact('vouchers'));
    }
    public function saveEdit(Request $request)
    {
        $this->voucherService->edit($request);
        return redirect()->route('admin.voucher.index')->with('success', 'Cập nhật thành công');
    }
    public function showEdit(Request $request)
    {
        $voucher = $this->voucherService->getById($request->id);
        return view('admin.voucher.edit_voucher', compact('voucher'));
    }
    public function add(Request $request)
    {
        $id = $this->voucherService->add($request);
        return redirect()->route('admin.voucher.index')->with('success', 'Thêm thành công');
    }
    public function showAdd()
    {
        return view('admin.voucher.add_voucher');
    }
    public function delete($id)
    {
        $this->voucherService->delete($id);
        return redirect()->route('admin.voucher.index')->with('success', 'Xóa thành công');
    }
}