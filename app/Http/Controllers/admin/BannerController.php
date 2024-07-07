<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $bannerService;
    //
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $allBanner = $this->bannerService->getAll();
        return view('admin.banner.banner', compact('allBanner'));
    }

    public function showAddBanner()
    {
        return view('admin.banner.add_banner');
    }

    public function addBanner(Request $request)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_content' => 'required',
            'banner_image' => 'required',
        ]);
        $bannerTitle = $request->banner_title;
        $bannerContent = $request->banner_content;
        $imageName = time() . '_' . $request->banner_image->getClientOriginalName();
        // Public Folder
        $request->banner_image->move(public_path('img'), $imageName);
        $this->bannerService->add($bannerTitle, $bannerContent, $imageName);
        return redirect(route('admin.banner.index'))->with('success', 'Thêm banner thành công');
    }

    public function showEditBanner(Request $request)
    {
        $id = $request->id;
        $bannerInfo = $this->bannerService->getById($id);
        return view('admin.banner.edit_banner', compact('id', 'bannerInfo'));
    }

    public function editBanner(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'banner_title' => 'required',
            'banner_content' => 'required',
            'banner_image' => 'required',
        ]);
        $id = $request->id;
        $bannerTitle = $request->banner_title;
        $bannerContent = $request->banner_content;
        $imageName = time() . '_' . $request->banner_image->getClientOriginalName() ?? null;
        if ($request->banner_image) {
            $imageName = time() . '_' . $request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path('img'), $imageName);
            $oldImagePath = $this->bannerService->getById($request->id)->image;
            if (file_exists(public_path('img') . '/' . $oldImagePath)) {
                unlink(public_path('img') . '/' . $oldImagePath);
            }
        }
        $this->bannerService->edit($id, $bannerTitle, $bannerContent, $imageName);
        return redirect(route('admin.banner.index'))->with('success', 'Sửa banner thành công');
    }

    public function deleteBanner(Request $request)
    {
        $id = $request->id;
        $this->bannerService->delete($id);
        return redirect(route('admin.banner.index'))->with('success', 'Xóa banner thành công');
    }
}
