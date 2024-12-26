<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $testimonial = Testimonial::query();

        if (!empty($keyword)) {
            $testimonial->where('title', 'like', "%$keyword%");
        }
        $testimonialData = $testimonial->paginate(5);

        return view('testimonial.index',compact('testimonialData'));
    }

    public function create(){
        return view('testimonial.create');
    }

    public function store(TestimonialRequest $request){
//        dd($request);
        $testimonial=Testimonial::create($request->all());
        $image = $request->file('image')->store('public/testimonial');

        $testimonial->image = str_replace('public/', '', $image);
        $testimonial->save();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial  created successfully.');
    }

    public function edit(Testimonial $testimonial){

        return view('testimonial.edit',compact('testimonial'));
    }

    public function update(Testimonial $testimonial , TestimonialRequest $request){
        $testimonialData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/testimonial');
            $testimonialData['image'] = str_replace('public/', '', $imagePath);
        }

        $testimonial->update($testimonialData);

        return redirect()->route('testimonial.index')->with('success', 'testimonial item successfully updated');
    }


    public function delete(Testimonial $testimonial){
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('error','Successfully  testimonial items deleted');

    }
    public function duplicate(Testimonial $testimonial){
        $productDuplicate=$testimonial->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
