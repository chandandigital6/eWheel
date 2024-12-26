<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $blog = Blog::query();

        if (!empty($keyword)) {
            $blog->where('title', 'like', "%$keyword%");
        }
        $blogData = $blog->paginate(5);

        return view('blog.index',compact('blogData'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(BlogRequest $request){
//        dd($request);
        $blog=Blog::create($request->all());
        $image = $request->file('image')->store('public/blog');

        $blog->image = str_replace('public/', '', $image);
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog  created successfully.');
    }

    public function edit(Blog $blog){

        return view('blog.edit',compact('blog'));
    }

    public function update(Blog $blog , BlogRequest $request){
        $blogData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/blog');
            $blogData['image'] = str_replace('public/', '', $imagePath);
        }

        $blog->update($blogData);

        return redirect()->route('blogs.index')->with('success', 'blog item successfully updated');
    }


    public function delete(Blog $blog){
        $blog->delete();
        return redirect()->route('blogs.index')->with('error','Successfully  blog items deleted');

    }
    public function duplicate(Blog $blog){
        $productDuplicate=$blog->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
