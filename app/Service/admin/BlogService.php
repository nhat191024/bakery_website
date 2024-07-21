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
        $user_id = Auth::id();
        $id = $request->id;
        $blog = $this->getById($id);
        if($request->hasFile('thumbnail')) {
            $imageName = time() . '_' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('img/client/blog'), $imageName);
            $blog->thumbnail = $imageName;
        }
        $blog->user_id = ($user_id?$user_id:1);
        $blog->title = $request->title;
        $blog->title_en = $request->title_en;
        $blog->subtitle = $request->subtitle;
        $blog->subtitle_en = $request->subtitle_en;
        $blog->content = $request->content;
        $blog->content_en = $request->content_en;
        $blog->save();
        return $id;
    }

    public function add($request)
    {
        $user_id = Auth::id();
        $imageName = time() . '_' . $request->thumbnail->getClientOriginalName();
        $request->thumbnail->move(public_path('img/client/blog'), $imageName);
        $id = Blogs::create([
            'user_id' => ($user_id?$user_id:1),
            'title' => $request->title,
            'title_en' => $request->title_en,
            'subtitle' => $request->subtitle,
            'subtitle_en' => $request->subtitle_en,
            'content' => $request->content,
            'content_en' => $request->content_en,
            'thumbnail' => $imageName,
        ])->id;
        return $id;
    }

    public function deleteById($id)
    {
        $this->getById($id)->delete();
        return true;
    }

    public function destroyById($id)
    {
        $this->recoverById($id);
        $this->getById($id)->forceDelete();
        return true;
    }

    public function recoverById($id)
    {
        Blogs::withTrashed()->where('id', $id)->restore();
        return true;
    }
}
