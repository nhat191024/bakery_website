<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\CategoryService;
use App\Service\admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    //
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $allProduct = $this->productService->getAll();
        return view('admin.product.product', compact('allProduct'));
    }

    public function showAddFood()
    {
        $allCategory = $this->categoryService->getAll();
        return view('admin.product.add_food', compact('allCategory'));
    }

    public function addFood(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'food_name' => 'required',
            'food_price' => 'required',
            'food_image' => 'required',
        ]);
        $categoryId = $request->category_id;
        $foodName = $request->food_name;
        $foodPrice = $request->food_price;
        $imageName = time() . '_' . $request->food_image->getClientOriginalName();
        // Public Folder
        $request->food_image->move(public_path('img'), $imageName);
        $this->productService->add($categoryId, $foodName, $foodPrice, $imageName);
        return redirect(route('admin.product.index'))->with('success', 'Thêm thực phẩm thành công');
    }

    public function showEditFood(Request $request)
    {
        $id = $request->id;
        $allCategory = $this->categoryService->getAll();
        $foodInfo = $this->productService->getById($id);
        return view('admin.product.edit_food', compact('id', 'foodInfo', 'allCategory'));
    }

    public function editFood(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'category_id' => 'required',
            'food_name' => 'required',
            'food_price' => 'required',
        ]);
        $id = $request->id;
        $categoryId = $request->category_id;
        $foodName = $request->food_name;
        $foodPrice = $request->food_price;
        if ($request->food_image) {
            $imageName = time() . '_' . $request->food_image->getClientOriginalName();
            $request->food_image->move(public_path('img'), $imageName);
            $oldImagePath = $this->productService->getById($request->id)->image;
            if (file_exists(public_path('img') . '/' . $oldImagePath)) {
                unlink(public_path('img') . '/' . $oldImagePath);
            }
        }
        $this->productService->edit($id, $categoryId, $foodName, $foodPrice, $imageName ?? null);
        return redirect(route('admin.product.index'))->with('success', 'Sửa thực phẩm thành công');
    }

    public function deleteFood(Request $request) {
        $id = $request->id;
        if(!$this->productService->checkHasChildren($id)) {
            $this->productService->delete($id);
            return redirect(route('admin.product.index'))->with('success', 'Xóa thực phẩm thành công') ;
        }
        return redirect(route('admin.product.index'))->with('error', 'Thực phẩm đang nằm trong món ăn, không thể xóa !!!');
    }
}
