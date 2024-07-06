<?php

namespace App\Service\client;

use App\Models\Categories;

class CategoryService
{
    public function getAll() {
        return Categories::all();
    }


}
