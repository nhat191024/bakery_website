<?php

namespace App\Service\admin;

use App\Models\About_us;
use App\Models\Banners;

class AboutUsService
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

    public function edit($id, $aboutTitle, $aboutTitleEn, $aboutContent, $aboutContentEn, $imageName)
    {
        $about = About_us::where('id', $id)->first();
        $about->title = $aboutTitle;
        $about->title_en = $aboutTitleEn;
        $about->description = $aboutContent;
        $about->description_en = $aboutContentEn;
        if ($imageName != null) {
            $about->image = $imageName;
        }
        $about->save();
    }
}
