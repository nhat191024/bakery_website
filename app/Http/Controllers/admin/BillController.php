<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use App\Service\admin\BillService;
use App\Service\admin\BranchService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    private $billService;
    //
    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function index()
    {
        $allBill = $this->billService->getAll();
        return view('admin.bill.bill', compact('allBill'));
    }

    public function showDetail(Request $request)
    {
        $id = $request->id;
        $billInfo = $this->billService->getById($id);
        $billDetail = $this->billService->getAllByIdBill($id);
        return view('admin.bill.bill_detail', compact('billInfo', 'billDetail'));
    }

    public function editStatus(Request $request)
    {
        $request->validate([
            'bill_status' => 'required',
            'bill_id' => 'required',
        ]);
        $id = $request->bill_id;
        $status = $request->bill_status;
        $this->billService->updateStatus($id, $status);
        return redirect(route('admin.bill.show_detail', ['id' => $id]))->with('success', 'Cập nhật trạng thái đơn thành công');
    }

    public function getPending()
    {
        return Bills::all()->where('status', 0);
    }
}
