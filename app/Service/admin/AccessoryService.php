<?php

namespace App\Service\admin;

use App\Models\Accessory;

class AccessoryService
{
    public function getAll()
    {
        $accessory = Accessory::all();
        return $accessory;
    }

    public function getById($id)
    {
        return Accessory::where('id', $id)->first();
    }

    public function edit($request)
    {
        $accessory = Accessory::where('id', $request->id)->first();
        $accessory->name = $request->name;
        $accessory->description = $request->description;
        $accessory->price = $request->price;
        $accessory->save();
        return $accessory;
    }
}