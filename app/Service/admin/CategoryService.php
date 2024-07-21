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

    public function add($categoryName, $categoryName_en)
    {
        Categories::create([
            'name' => $categoryName,
            'name_en' => $categoryName_en
        ]);
    }

    public function edit($id, $categoryName, $categoryName_en)
    {
        $category = Categories::where('id', $id)->first();
        $category->name = $categoryName;
        $category->name_en = $categoryName_en;
        $category->save();
    }

    public function checkHasChildren($idCategory) {
        return Categories::find($idCategory)->products()->get()->count() > 0;
    }

    public function delete($idCategory) {
        Categories::destroy($idCategory);
    }
}
