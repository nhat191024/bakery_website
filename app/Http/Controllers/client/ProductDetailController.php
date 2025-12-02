<?php

namespace App\Http\Controllers\client;

use App\Models\ProductView;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Service\client\ProductDetailService;

class ProductDetailController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new ProductDetailService();
    }

    public function index($productId)
    {
        // Ghi log vào MongoDB
        try {
            ProductView::create([
                'session_id' => Session::getId(),
                'product_id' => $productId,
                'viewed_at' => now(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            logger()->error('Mongo log error: ' . $e->getMessage());
        }

        return $this->service->index($productId);
    }

    public function recent()
    {
        $sessionId = Session::getId();
        $lang = session()->get('language');

        // Lấy 10 bản ghi gần nhất từ Mongo
        $views = ProductView::where('session_id', $sessionId)
            ->orderBy('viewed_at', 'desc')
            ->limit(10)
            ->get();

        // Lấy danh sách product_id
        $productIds = $views->pluck('product_id')->unique()->toArray();

        // Lấy thông tin sản phẩm từ MySQL
        $products = Products::whereIn('id', $productIds)->get();

        return view('client.shop.recent-views', compact('products', 'lang'));
    }


}
