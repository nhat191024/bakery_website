<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\CategoryService;
use App\Service\admin\ProductService;
use App\Service\admin\VariationService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    private $variationService;

    //
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->variationService = new VariationService();
    }

    public function index()
    {
        $allProduct = $this->productService->getAll();
        return view('admin.product.product', compact('allProduct'));
    }

    public function showAddProduct()
    {
        $allCategory = $this->categoryService->getAll();
        $allVariations = $this->variationService->getAll();
        return view('admin.product.add_product', compact('allCategory','allVariations'));
    }

    public function showDetail(Request $request)
    {
        $id = $request->id;
        $productInfo = $this->productService->getById($id);
        $allVariations = $this->variationService->getAll();
        return view('admin.product.detail', compact('id', 'productInfo','allVariations'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_name_en' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
        ]);
        $categoryId = $request->category_id;
        $productName = $request->product_name;
        $productNameEn = $request->product_name_en;
        $productPrice = $request->product_price;
        $productDescription = $request->product_description ?? null;
        $productDescriptionEn = $request->product_description_en ?? null;
        $imageName = time() . '_' . $request->product_image->getClientOriginalName();
        // Public Folder
        $request->product_image->move(public_path('img/client/shop'), $imageName);
        return $this->productService->add($categoryId, $productName, $productNameEn, $productPrice, $productDescription, $productDescriptionEn, $imageName);

}

    public function showEditProduct(Request $request)
    {
        $id = $request->id;
        $allCategory = $this->categoryService->getAll();
        $productInfo = $this->productService->getById($id);
        $allVariations = $this->variationService->getAll();
        return view('admin.product.edit_product', compact('id', 'productInfo', 'allCategory', 'allVariations'));
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
            'product_name_en' => 'required',
        ]);
        $id = $request->id;
        $categoryId = $request->category_id;
        $productName = $request->product_name;
        $productNameEn = $request->product_name_en;
        $productPrice = $request->product_price;
        $productDescription = $request->product_description ?? null;
        $productDescriptionEn = $request->product_description_en ?? null;
        if ($request->product_image && $request->product_image != 'undefined') {
            $imageName = time() . '_' . $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('img/client/shop'), $imageName);
            $oldImagePath = $this->productService->getById($request->id)->image;
            if (file_exists(public_path('img/client/shop') . '/' . $oldImagePath)) {
                unlink(public_path('img/client/shop') . '/' . $oldImagePath);
            }
        }
        return $this->productService->edit($id, $categoryId, $productName, $productNameEn, $productPrice, $productDescription, $productDescriptionEn, $imageName ?? null);
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
        if($this->productService->checkHasPromotion($id)) {
            return redirect(route('admin.product.index'))->with('error', 'Sản phẩm đang khuyễn mãi không thể xóa');
        }
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
