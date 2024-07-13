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

    public function showAddProduct()
    {
        $allCategory = $this->categoryService->getAll();
        return view('admin.product.add_product', compact('allCategory'));
    }

    public function showDetail(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = $request->id;
        $productInfo = $this->productService->getById($id);
        return view('admin.product.detail', compact('productInfo'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
        ]);
        $categoryId = $request->category_id;
        $productName = $request->product_name;
        $productPrice = $request->product_price;
        $productDescription = $request->product_description ?? null;
        $imageName = time() . '_' . $request->product_image->getClientOriginalName();
        // Public Folder
        $request->product_image->move(public_path('img'), $imageName);
        $this->productService->add($categoryId, $productName, $productPrice, $productDescription, $imageName);
        return redirect(route('admin.product.index'))->with('success', 'Thêm sản phẩm thành công');
    }

    public function showEditProduct(Request $request)
    {
        $id = $request->id;
        $allCategory = $this->categoryService->getAll();
        $productInfo = $this->productService->getById($id);
        return view('admin.product.edit_product', compact('id', 'productInfo', 'allCategory'));
    }

    public function showEditDetail(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'product_id' => 'required',
        ]);
        $id = $request->id;
        $productId = $request->product_id;
        $productVariatonInfo = $this->productService->getDetailById($id);
        return view('admin.product.edit_detail', compact('id', 'productVariatonInfo', 'productId'));
    }

    public function editProduct(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
        ]);
        $id = $request->id;
        $categoryId = $request->category_id;
        $productName = $request->product_name;
        if ($request->product_image) {
            $imageName = time() . '_' . $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('img'), $imageName);
            $oldImagePath = $this->productService->getById($request->id)->image;
            if (file_exists(public_path('img') . '/' . $oldImagePath)) {
                unlink(public_path('img') . '/' . $oldImagePath);
            }
        }
        $this->productService->edit($id, $categoryId, $productName, $imageName ?? null);
        return redirect(route('admin.product.index'))->with('success', 'Sửa sản phẩm thành công');
    }

    public function editDetail(Request $request)
    {
        $request->validate([
            'product_price' => 'required',
            'id' => 'required',
            'product_id' => 'required',
        ]);
        $id = $request->id;
        $productId = $request->product_id;
        $productPrice = $request->product_price;
        $this->productService->editDetail($id, $productPrice);
        return redirect(route('admin.product.show_detail', ['id' => $productId]))->with('success', 'Sửa biến thể thành công');
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->id;
        $this->productService->delete($id);
        return redirect(route('admin.product.index'))->with('success', 'Ẩn thực phẩm thành công');
    }

    public function restoreProduct(Request $request)
    {
        $id = $request->id;
        $this->productService->restore($id);
        return redirect(route('admin.product.index'))->with('success', 'Khôi phục thực phẩm thành công');
    }

    public function deleteDetail(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'product_id' => 'required',
        ]);
        $id = $request->id;
        $productId = $request->product_id;
        if ($this->productService->deleteDetail($id, $productId)) {
            return redirect(route('admin.product.show_detail', ['id' => $productId]))->with('success', 'Xóa biến thể thành công');
        }
        return redirect(route('admin.product.show_detail', ['id' => $productId]))->with('error', 'Biến thể không thể ít hơn 1 !!!!');

    }
}
