<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Promotions;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    // Bảng product
    public function index()
    {
        $lang = session()->get('language');

        $products = Products::select('id', 'name', 'name_en', 'image', 'created_at')
            ->with('product_variations:id,product_id,price')
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();

        $categoriesL = Categories::select('id', 'name', 'name_en')->orderBy('id', 'asc')->take(2)->get();
        $categoriesR = Categories::select('id', 'name', 'name_en')->orderBy('id', 'desc')->take(2)->get();
        $categoryIds = $categoriesL->pluck('id')->merge($categoriesR->pluck('id'))->unique();
        $categoryImages = DB::table('products')
            ->select('category_id', 'image')
            ->whereIn('category_id', $categoryIds)
            ->whereNotNull('image')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('category_id')
            ->map(fn ($categoryProducts) => $categoryProducts->first()->image);

        $imagesCategoryL = $this->mapCategoryImages($categoriesL, $categoryImages);
        $imagesCategoryR = $this->mapCategoryImages($categoriesR, $categoryImages);

        $banners = Banners::select('image', 'title', 'title_en', 'subtitle', 'subtitle_en')->get();
        $promotions = Promotions::with([
            'products:id,name,image',
            'products.product_variations:id,product_id,price',
        ])
            ->orderBy('product_id', 'asc')
            ->take(1)
            ->get();
        $price = $promotions->first()?->products?->product_variations?->first()?->price ?? 0;

        return view('client.homePage', compact('products', 'banners', 'price', 'promotions', 'categoriesL', 'categoriesR', 'imagesCategoryL', 'imagesCategoryR', 'lang'));
    }

    private function mapCategoryImages($categories, $categoryImages)
    {
        return $categories->mapWithKeys(function ($category) use ($categoryImages) {
            return [$category->id => $categoryImages->get($category->id, 'product-22.webp')];
        });
    }
}
