<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banners.index', compact('banner'));
    }

    public function add(BannerRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
                $request->banner_image = uploadFile('images/banner', $request->file('banner_image'));
            }

            $banner = new Banner();

            $banner->banner_title = $request->banner_title;
            $banner->banner_url = $request->banner_url;
            $banner->banner_image = $request->banner_image;

            $banner->save();

            if ($banner->save()) {
                $notification = array(
                    "message" => "Add banner successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('banner.index')->with($notification);
            }
        }

        return view('admin.banners.add');
    }


    public function edit(BannerRequest $request, $id)
    {
        $detail = Banner::findOrFail($id);
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            $update = Banner::where('id', $id);
            if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
                $img = $request->banner_image = uploadFile('images/banner', $request->file('banner_image'));
                $update->update([
                    'banner_title' => $request->banner_title,
                    'banner_image' => $img,
                    'banner_url' => $request->banner_url,
                ]);
            } else {
                $update->update([
                    'banner_title' => $request->banner_title,
                    'banner_url' => $request->banner_url,
                ]);
            }
            $notification = array(
                "message" => "Update banner successfully",
                "alert-type" => "success",
            );
            return redirect()->route('banner.index')->with($notification);
        }

        return view('admin.banners.edit', compact('detail'));
    }

    public function delete($id)
    {
        if ($id) {
            $banner = Banner::where('id', $id);
            $deleted = $banner->delete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted banner successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('banner.index')->with($notification);
            }
        } else {
            $notification = array(
                "message" => "Delete banner failed",
                "alert-type" => "success",
            );
            return redirect()->back()->with($notification);
        }
        return;
    }
}
