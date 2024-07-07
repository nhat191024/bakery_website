<?php

namespace App\Service\admin;

use App\Models\Branch;
use App\Models\CookingMethod;

class BillService
{
    public function getAll()
    {
        $branch = Branch::all();
        return $branch;
    }

    public function getById($id) {
        return Branch::where('id', $id)->first();
    }
}
