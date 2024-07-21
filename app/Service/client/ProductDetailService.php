<?php

namespace App\Service\client;

use App\Models\Categories;
use App\Models\Products;

class ProductDetailService

{
    public function index($productId)
    {
        $product = Products::find($productId);
        $categoryId = 0;
        try {
            $categoryId = $product->categories->id; 
        } catch (\Throwable $th) {
            return redirect()->route('client.shop.productList');
        }

        $relatedProducts = Products::where('category_id', $categoryId)
        ->where('id', '!=', $product->id)->paginate(3);

        return view('client.shop.productDetail')
            ->with('product', Products::find($productId))
            ->with('products', $relatedProducts);
    }
}
