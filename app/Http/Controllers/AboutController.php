<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $about = About::query();

        if (!empty($keyword)) {
            $about->where('title', 'like', "%$keyword%");
        }
        $aboutData = $about->paginate(5);

        return view('about.index',compact('aboutData'));
    }

    public function create(){
        return view('about.create');
    }

    public function store(AboutRequest $request){
        $about=About::create($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public'); // Save the image to the 'about' folder
            $about->image = str_replace('public/', '', $imagePath); // Update the image field
            $about->save(); // Save the changes to the database
        }
        return redirect()->route('about.index')->with('success', 'About  created successfully.');
    }

    public function edit(About $about){

        return view('about.edit',compact('about'));
    }

    public function update(About $about , AboutRequest $request){
        $aboutData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/about');
            $aboutData['image'] = str_replace('public/', '', $imagePath);
        }

        $about->update($aboutData);

        return redirect()->route('about.index')->with('success', 'about item successfully updated');
    }


    public function delete(About $about){
        $about->delete();
        return redirect()->route('about.index')->with('error','Successfully  about items deleted');

    }
    public function duplicate(About $about){
        $productDuplicate=$about->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
