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
            'about_content' => 'required',
        ]);
        $id = $request->id;
        $aboutTitle = $request->about_title;
        $aboutContent = $request->about_content;
        if ($request->about_image) {
            $imageName = time() . '_' . $request->about_image->getClientOriginalName();
            $request->about_image->move(public_path('img'), $imageName);
            $oldImagePath = $this->aboutUsService->getById($request->id)->image;
            if (file_exists(public_path('img') . '/' . $oldImagePath) && $oldImagePath != null) {
                unlink(public_path('img') . '/' . $oldImagePath);
            }
        }
        $this->aboutUsService->edit($id, $aboutTitle, $aboutContent, $imageName ?? null);
        return redirect(route('admin.about.index'))->with('success', 'Sửa about thành công');
    }
}
