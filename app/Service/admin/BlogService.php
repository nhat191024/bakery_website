<?php

namespace App\Service\admin;

use App\Models\Blogs;

class BlogService
{
    public function getAll()
    {
        $blog = Blogs::all();
        return $blog;
    }

    public function getById($id) {
        return Blogs::where('id', $id)->first();
    }

    public function delete($request)
    {
        $id = $request->id;
        $this->getById($id)->delete();
        return true;
    }

    public function recover($request)
    {
        $id = $request->id;
        Blogs::withTrashed()->where('id', $id)->restore();
        return true;
    }

}
