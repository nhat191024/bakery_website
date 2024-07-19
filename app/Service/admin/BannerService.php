<?php

namespace App\Service\admin;

use App\Models\Banners;

class BannerService
{
    public function getAll()
    {
        $banner = Banners::all();
        return $banner;
    }

    public function getById($id) {
        return Banners::where('id', $id)->first();
    }

    public function add($bannerTitle, $bannerContent, $imageName)
    {
        Banners::create([
            'title' => $bannerTitle,
            'subtitle' => $bannerContent,
            'image' => $imageName
        ]);
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

    public function delete($id) {
        $banner = Banners::destroy($id);
    }
}
