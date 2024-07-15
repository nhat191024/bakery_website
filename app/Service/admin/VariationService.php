<?php
namespace App\Service\admin;

use App\Models\Variation;

class VariationService
{
    public function getAll()
    {
        $variations = Variation::all();
        return $variations;
    }

    public function getById($id)
    {
        $variations = Variation::find($id);
        return $variations;
    }

    public function update($id, $name)
    {
       return VariationService::getById($id)->update(['name' => $name]);
    }
}