<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\VariationService;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    private $variationService;
    public function __construct(VariationService $variationService)
    {
        $this->variationService = $variationService;
    }

    public function index()
    {
        $allVariation = $this->variationService->getAll();
        return view('admin.variation.variation', compact('allVariation'));
    }

    public function showEdit(Request $request)
    {
        $id = $request->id;
        $name = $this->variationService->getById($id)->name;
        return view('admin.variation.edit_variation', compact('id', 'name'));
    }

    public function saveEdit(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if(!$this->variationService->update($id, $name))
            return redirect()->route('admin.variation.edit', ['id' => $id])->with('error', 'Cập nhật thất bại');
        return redirect()->route('admin.variation.index')->with('success', 'Cập nhật thành công');
    }
}