<?php

namespace App\Service\admin;

use App\Models\Variation;

class VariationService
{
    public function getAll()
    {
        $variations = Variation::withTrashed()->get();
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
    public function delete($id)
    {
        return VariationService::getById($id)->delete();
    }
    public function restore($id)
    {
        try {
            Variation::withTrashed()->where('id', $id)->restore();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function add($name)
    {
        return Variation::create([
            'name' => $name,
        ])->id;
    }
}
