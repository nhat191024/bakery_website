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
        $lang = session()->get('language');
        $blogs = Blogs::all();
        $blogs = Blogs::take(5)->get();
        $recentBlogs = Blogs::take(3)->get();
        $categories = Categories::all();
        foreach ($blogs as $blog) {
            $user = User::where('id', $blog->user_id)->value('username');
            $users[] = $user;
        }

        return view('client.blog.blogPage', compact('blogs', 'recentBlogs', 'categories', 'users', 'lang'));
    }

    public function show($id)
    {
        $lang = session()->get('language');
        $Blogs  = Blogs::where('id', $id)->first();
        $recentBlogs = Blogs::with('user')->take(3)->get();
        $Categories = Categories::paginate(6);
        $User = User::where('id', $Blogs->user_id)->value('username');
        return view('client.blog.blogDetail', compact('Blogs', 'recentBlogs','Categories','User', 'lang'));
    }
}
