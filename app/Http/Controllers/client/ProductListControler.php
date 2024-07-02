<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\client\ProductListService;

class ProductListControler extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new ProductListService();
    }

    public function index()
    {
        return $this->service->index();
    }
}
