<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\AboutUsService;
use App\Service\admin\AccessoryService;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    private $accessoryService;
    
    public function __construct(AccessoryService $accessoryService)
    {
        $this->accessoryService = $accessoryService;
    }

    public function index()
    {
        $accessories = $this->accessoryService->getAll();
        return view('admin.accessory.accessory', compact('accessories'));
    }

    public function showEdit(Request $request)
    {
        $id = $request->id;
        $accessory = $this->accessoryService->getById($id);
        return view('admin.accessory.edit_accessory', compact('id', 'accessory'));
    }

    public function saveEdit(Request $request)
    {
        $this->accessoryService->edit($request);
        return redirect()->route('admin.accessory.index')->with('success', 'Cập nhật thông tin phụ kiện thành công');
    }

}