<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Categories;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id){  
        $Blogs  = Blogs::where('id', $id)->first();
        $Categories = Categories::paginate(6);
        return view('client.blog.blogdetail', compact('Blogs', 'Categories'));
    }   
}
