<?php

namespace App\Service\admin;

use App\Models\Blogs;
use Illuminate\Support\Facades\Auth;

class BlogService
{
    public function getAll()
    {
        // $blog = Blogs::all();
        $blog = Blogs::withTrashed()->get();
        return $blog;
    }

    public function getById($id)
    {
        return Blogs::where('id', $id)->first();
    }

    public function update($request)
    {
        $id = $request->id;
        $blog = $this->getById($id);
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->content = $request->content;
        $blog->save();
    }

    public function add($request)
    {
        $user_id = Auth::id();
        $id = Blogs::create([
            'user_id' => ($user_id?$user_id:null),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content
        ])->id;
        return $id;
    }

    public function deleteById($id)
    {
        $this->getById($id)->delete();
        return true;
    }

    public function recoverById($id)
    {
        Blogs::withTrashed()->where('id', $id)->restore();
        return true;
    }
}
