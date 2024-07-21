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
        $request->validate([
            'title' => 'required',
            'title_en' => 'required',
            'subtitle' => 'required',
            'subtitle_en' => 'required',
            'content' => 'required',
            'content_en' => 'required',
            'thumbnail' => 'required',
        ]);
        $this->blogService->update($request);
    }

    public function showAdd() {
        return view('admin.blog.add_blog');
    }

    public function add(Request $request) {
        $request->validate([
            'title' => 'required',
            'title_en' => 'required',
            'subtitle' => 'required',
            'subtitle_en' => 'required',
            'content' => 'required',
            'content_en' => 'required',
            'thumbnail' => 'required',
        ]);
        return $this->blogService->add($request);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $this->blogService->deleteById($id);
        return redirect()->route('admin.blog.index')->with('success', 'Đã ẩn blog thành công');
    }
    public function destroy(Request $request) {
        $id = $request->id;
        $this->blogService->destroyById($id);
        return redirect()->route('admin.blog.index')->with('success', 'Đã xoá vĩnh viễn blog!');
    }

    public function recover(Request $request) {
        $id = $request->id;
        $this->blogService->recoverById($id);
        return redirect()->route('admin.blog.index')->with('success', 'Đã hiển thị blog trở lại');
    }
}
