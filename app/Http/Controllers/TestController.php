<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillDetailsCollection;
use App\Http\Resources\BlogsCollection;
use App\Http\Resources\ProductsCollection;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\CategoriesCollection;
use App\Http\Resources\PromotionsCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Bill_details;
use App\Models\Blogs;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Promotions;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get($id)
    {
        $obj = User::where('id', $id)
        // ->get()
        ;
        $obj = $obj->with("promotions","blogs")->get();
        return new UserCollection($obj);
    }
}
