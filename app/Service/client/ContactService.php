<?php

namespace App\Service\client;

use App\Models\Categories;

class CategoryService
{
    public function getAll() {
        return Categories::all();
    }

    public function create($table) {
        Categories::create([
            'name' => $table['name'],
            'email' => $table['email'],
            'subject' => $table['subject'],
            'message' => $table['message'],
        ]);
    }
}
