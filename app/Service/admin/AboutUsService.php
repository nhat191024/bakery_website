<?php

namespace App\Service\admin;

use App\Models\Banners;

class AboutUsService
{
    public function getAll()
    {
        $banner = Banners::all();
        return $banner;
    }

    public function getById($id) {
        return Banners::where('id', $id)->first();
    }

    public function edit($id, $bannerTitle, $bannerContent, $imageName)
    {
        $banner = Banners::where('id', $id)->first();
        $banner->title = $bannerTitle;
        $banner->subtitle = $bannerContent;
        if ($imageName != null) {
            $banner->image = $imageName;
        }
        $banner->save();
    }
