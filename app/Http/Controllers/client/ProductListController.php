<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Service\client\ProductListService;

class ProductListController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new ProductListService();
    }

    public function index($categoryId = null)
    {
        return $this->service->index($categoryId);
    }
}
