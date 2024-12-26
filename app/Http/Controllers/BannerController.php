<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $banner = Banner::query();

        if (!empty($keyword)) {
            $banner->where('title', 'like', "%$keyword%");
        }
         $bannerData = $banner->paginate(5);

        return view('banner.index',compact('bannerData'));
    }

    public function create(){
        return view('banner.create');
    }

    public function store(BannerRequest $request){
        $banner=Banner::create($request->all());
        $image = $request->file('image')->store('public/banner');

        $banner->image = str_replace('public/', '', $image);
        $banner->save();
        return redirect()->route('banner.index')->with('success', 'Banner  created successfully.');
    }

    public function edit(Banner $banner){

        return view('banner.edit',compact('banner'));
    }

    public function update(Banner $banner , BannerRequest $request){
        $bannerData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/banner');
            $bannerData['image'] = str_replace('public/', '', $imagePath);
        }

        $banner->update($bannerData);

        return redirect()->route('banner.index')->with('success', 'banner item successfully updated');
    }


    public function delete(Banner $banner){
        $banner->delete();
        return redirect()->route('banner.index')->with('error','Successfully  banner items deleted');

    }
    public function duplicate(Banner $banner){
        $productDuplicate=$banner->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
