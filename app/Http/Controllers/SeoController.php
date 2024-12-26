<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoRequest;
use App\Models\Course;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $seo = Seo::query();

        if (!empty($keyword)) {
            $seo->where('title', 'like', "%$keyword%");
        }
        $seoData = $seo->paginate(5);

        return view('seo.index',compact('seoData'));
    }

    public function create(){
        $courses=Course::all();
        return view('seo.create',compact('courses'));
    }

    public function store(SeoRequest $request){
//        dd($request);
        $seo=Seo::create($request->all());
//        $image = $request->file('image')->store('public/seo');
//
//        $seo->image = str_replace('public/', '', $image);
//        $seo->save();
        return redirect()->route('seo.index')->with('success', 'Seo  created successfully.');
    }

    public function edit(Seo $seo){
        $courses=Course::all();
        return view('seo.edit',compact('seo','courses'));
    }

    public function update(Seo $seo , SeoRequest $request){
        $seoData = $request->all();
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('public/seo');
//            $seoData['image'] = str_replace('public/', '', $imagePath);
//        }

        $seo->update($seoData);

        return redirect()->route('seo.index')->with('success', 'seo item successfully updated');
    }


    public function delete(Seo $seo){
        $seo->delete();
        return redirect()->route('seo.index')->with('error','Successfully  seo items deleted');

    }
    public function duplicate(Seo $seo){
        $productDuplicate=$seo->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
