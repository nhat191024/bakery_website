<?php

namespace App\Service\admin;

use App\Models\About_us;
use App\Models\Banners;

class MessageService 
{
    public function getAll()
    {
        $about = About_us::first();
        return $about;
    }

    public function getById($id)
    {
        return About_us::where('id', $id)->first();
    }

    public function edit($id, $aboutTitle, $aboutContent, $imageName)
    {
        $about = About_us::where('id', $id)->first();
        $about->title = $aboutTitle;
        $about->description = $aboutContent;
        if ($imageName != null) {
            $about->image = $imageName;
        }
        $about->save();
    }
}