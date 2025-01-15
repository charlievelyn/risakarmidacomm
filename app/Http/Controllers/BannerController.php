<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function listbanner()
    {
        $banners = Banner::all();
        return view('components.profile.listbanner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $image = $request->file('image');

        $imageName = now()->format('Ymd_His') . '_' . strtolower(explode(' ', $title)[0]) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/asset/banners'), $imageName);

        $banner = new Banner();
        $banner->title = $title;
        $banner->description = $description;
        $banner->image_path = 'storage/asset/banners/' . $imageName;
        $banner->save();

        return redirect()->route('banners.listbanner')->with('success', 'Banner uploaded successfully!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if (file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
        }
        $banner->delete();

        return redirect()->route('banners.listbanner')->with('success', 'Banner deleted successfully!');
    }
}
