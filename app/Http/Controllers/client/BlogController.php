<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blogs;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id){  
        $Blogs  = Blogs::where('id', $id)->first();
        return view('client.blog.blogdetail',compact('Blogs'));
    }   
}
