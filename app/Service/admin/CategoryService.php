<?php

namespace App\Service\admin;

use App\Models\Categories;

class CategoryService
{
    public function getAll() {
        return Categories::all();
    }

    public function add($categoryName) {
        Categories::create([
            'name' => $categoryName,
        ]);
    }
}
