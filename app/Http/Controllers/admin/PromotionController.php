<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\ProductService;
use App\Service\admin\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    private $promotionService;
    private $productService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
        $this->productService = new ProductService();
    }

    public function index()
    {
        $promotion = $this->promotionService->get();
        return view('admin.promotion.promotion', compact('promotion'));
    }

    public function showEdit(Request $request)
    {
        $promotion = $this->promotionService->get();
        $products = $this->productService->getAll();
        return view('admin.promotion.edit_promotion', compact('promotion','products'));
    }

    public function saveEdit(Request $request)
    {
        if(!$this->promotionService->edit($request))
            return redirect()->route('admin.promotion.edit', ['id' => $request->id])->with('error', 'Cập nhật thất bại');
        return redirect()->rowwute('admin.promotion.index')->with('success', 'Cập nhật thành công');
    }

}
