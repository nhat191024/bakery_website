<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index() {
        $allCategory = $this->categoryService->getAll();
        return view('admin.category.category', compact('allCategory'));
    }

    public function showAddCategory() {
        return view('admin.category.add_category');
    }

    public function addCategory(Request $request) {
        $request->validate([
            'category_name' => 'required',
        ]);
        $categoryName = $request->category_name;
        $this->categoryService->add($categoryName);
        return redirect(route('admin.category.index'))->with('success', 'Thêm danh mục thành công');
    }
}
