<?php

namespace App\Service\admin;

use App\Models\Categories;

class CategoryService
{
    public function getAll()
    {
        $category = Categories::all();
        return $category;
    }

    public function getById($id) {
        return Categories::where('id', $id)->first();
    }

    public function add($categoryName)
    {
        Categories::create([
            'name' => $categoryName,
        ]);
    }

    public function edit($id, $categoryName)
    {
        $category = Categories::where('id', $id)->first();
        $category->name = $categoryName;
        $category->save();
    }

    public function checkHasChildren($idCategory) {
        return Categories::find($idCategory)->products()->get()->count() > 0;
    }

    public function delete($idCategory) {
        Categories::destroy($idCategory);
    }
}
