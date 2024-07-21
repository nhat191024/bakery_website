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

    public function add($bannerTitle, $bannerTitleEn, $bannerContent, $bannerContentEn, $imageName)
    {
        Banners::create([
            'title' => $bannerTitle,
            'title_en' => $bannerTitleEn,
            'subtitle' => $bannerContent,
            'subtitle_en' => $bannerContentEn,
            'image' => $imageName
        ]);
    }

    public function edit($id, $bannerTitle, $bannerTitleEn, $bannerContent, $bannerContentEn, $imageName)
    {
        $banner = Banners::where('id', $id)->first();
        $banner->title = $bannerTitle;
        $banner->title_en = $bannerTitleEn;
        $banner->subtitle = $bannerContent;
        $banner->subtitle_en = $bannerContentEn;
        if ($imageName != null) {
            $banner->image = $imageName;
        }
        $banner->save();
    }

    public function delete($id) {
        $banner = Banners::destroy($id);
    }
}
