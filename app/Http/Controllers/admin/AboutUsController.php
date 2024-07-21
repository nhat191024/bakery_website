<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\AboutUsService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $aboutUsService;
    //
    public function __construct(AboutUsService $aboutUsService)
    {
        $this->aboutUsService = $aboutUsService;
    }

    public function index()
    {
        $aboutInfo = $this->aboutUsService->getAll();
        return view('admin.about.about', compact('aboutInfo'));
    }

    public function showEditBanner(Request $request)
    {
        $id = $request->id;
        $aboutInfo = $this->aboutUsService->getById($id);
        return view('admin.about.edit_about', compact('id', 'aboutInfo'));
    }

    public function editBanner(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'about_title' => 'required',
            'about_title_en' => 'required',
            'about_content' => 'required',
            'about_content_en' => 'required',
        ]);
        $id = $request->id;
        $aboutTitle = $request->about_title;
        $aboutTitleEn = $request->about_title_en;
        $aboutContent = $request->about_content;
        $aboutContentEn = $request->about_content_en;
        if ($request->about_image) {
            $imageName = time() . '_' . $request->about_image->getClientOriginalName();
            $request->about_image->move(public_path('img/about'), $imageName);
            $oldImagePath = $this->aboutUsService->getById($request->id)->image;
            if (file_exists(public_path('img/about') . '/' . $oldImagePath) && $oldImagePath != null) {
                unlink(public_path('img/about') . '/' . $oldImagePath);
            }
        }
        $this->aboutUsService->edit($id, $aboutTitle, $aboutTitleEn, $aboutContent, $aboutContentEn, $imageName ?? null);
        return redirect(route('admin.about.index'))->with('success', 'Sửa about thành công');
    }
}
