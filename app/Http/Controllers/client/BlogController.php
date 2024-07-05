<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id)
    {
        $Blogs  = Blogs::where('id', $id)->first();
        return view('client.blog.blogdetail', compact('Blogs'));
    }

    public function index()
    {
        $blogs = Blogs::all();
        $categories = Categories::all();
        return view('client.blog.blogPage', compact('blogs', 'categories'));
    }
}
