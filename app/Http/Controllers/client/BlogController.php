<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\User;


use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blogs::all();
        $blogs = Blogs::take(5)->get();
        $recentBlogs = Blogs::take(3)->get();
        $categories = Categories::all();
        $users = [];
        foreach ($blogs as $blog) {
            $user = User::where('id', $blog->user_id)->value('username');
            $users[] = $user;
        }
        return view('client.blog.blogPage', compact('blogs', 'recentBlogs', 'categories', 'users'));
    }

    public function show($id)
    {
        $Blogs  = Blogs::where('id', $id)->first();
        $recentBlogs = Blogs::with('user')->take(3)->get();
        $Categories = Categories::paginate(6);
        if ($Blogs == null) {
            return redirect()->route('client.blog.index');
        }
        $User = User::where('id', $Blogs->user_id)->value('username');
        return view('client.blog.blogdetail', compact('Blogs', 'recentBlogs', 'Categories', 'User'));
    }
}
