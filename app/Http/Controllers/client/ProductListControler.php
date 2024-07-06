<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Service\client\ProductListService;

class ProductListControler extends Controller
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
    public function show(){  
        $products  = Products::paginate(6);
        return view('client.blog.blogdetail',compact('products'));
    }
}
