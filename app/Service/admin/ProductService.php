<?php

namespace App\Service\admin;

use App\Models\Food;
use App\Models\Products;

class ProductService
{
    public function getAll()
    {
        $product = Products::where('status', 1)->get();
        return $product;
    }

    public function getById($id) {
        return Products::where('id', $id)->first();
    }

    public function add($categoryId, $productName, $productPrice, $productImage)
    {
        Products::create([
            'category_id' => $categoryId,
            'name' => $productName,
            'price' => $productPrice,
            'image' => $productImage
        ]);
    }

    public function edit($id, $categoryId, $productName, $productPrice, $productImage)
    {
        $product = Products::where('id', $id)->first();
        $product->category_id = $categoryId;
        $product->name = $productName;
        $product->price = $productPrice;
        if ($productImage != null) {
            $product->image = $productImage;
        }
        $product->save();
    }

    public function checkHasChildren($idFood) {
        return Products::find($idFood)->dish()->get()->count() > 0;
    }

    public function delete($idFood) {
        $product = Products::find($idFood);
        $product->status = 0;
        $product->save();
    }
}
