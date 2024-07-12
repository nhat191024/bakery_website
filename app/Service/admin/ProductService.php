<?php

namespace App\Service\admin;

use App\Models\Food;
use App\Models\Product_variation;
use App\Models\Products;

class ProductService
{
    public function getAll()
    {
        $product = Products::all();
        return $product;
    }

    public function getById($id)
    {
        return Products::where('id', $id)->first();
    }

    public function getDetailById($id)
    {
        return Product_variation::where('id', $id)->first();
    }

    public function add($categoryId, $productName, $productPrice, $productDescription, $imageName)
    {
        $id = Products::create([
            'category_id' => $categoryId,
            'name' => $productName,
            'description' => $productDescription,
            'image' => $imageName
        ])->id;
        Product_variation::create([
            'variation_id' => 1,
            'product_id' => $id,
            'price' => $productPrice,
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

    public function checkHasChildren($idFood)
    {
        return Products::find($idFood)->dish()->get()->count() > 0;
    }

    public function delete($detailId, $productId)
    {
        $product = Products::find($productId);
        if ($product->product_variations()->get()->count() > 1) {
            $productVariation = Product_variation::find($detailId);
            $productVariation->delete();
            return true;
        }
        return false;
    }
}
