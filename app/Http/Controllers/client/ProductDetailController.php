<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
        return $this->service->index($productId);
    }
}
