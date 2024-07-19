<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\BlogService;
use App\Service\admin\CategoryService;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    private $blogService;
    //
    public function __construct(BlogService $blogService) {
        $this->blogService = $blogService;
    }

    public function index() {
        $allBlog = $this->blogService->getAll();
        return view('admin.blog.blog', compact('allBlog'));
    }

    public function showEdit(Request $request) {
        $blog = $this->blogService->getById($request->id);
        return view('admin.blog.edit_blog', compact('blog'));
    }

    public function showDetail(Request $request) {
        $blog = $this->blogService->getById($request->id);
        return view('admin.blog.detail_blog', compact('blog'));
    }

    public function saveEdit(Request $request) {
        $this->blogService->update($request);
        return redirect()->route('admin.blog.index');
    }

    public function showAdd() {
        return view('admin.blog.add_blog');
    }
    
    public function add(Request $request) {
        return $this->blogService->add($request);
    }

    public function delete(Request $request) {
        $id = $request->id;
        return $this->blogService->deleteById($id);
    }

    public function recover(Request $request) {
        $id = $request->id;
        return $this->blogService->recoverById($id);
    }
}
