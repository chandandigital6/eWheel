<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $productCategory = ProductCategory::query();

        if (!empty($keyword)) {
            $productCategory->where('title', 'like', "%$keyword%");
        }
         $productCategoryData = $productCategory->paginate(5);

        return view('productcategory.index',compact('productCategoryData'));
    }

    public function create(){
        return view('productcategory.create');
    }

    public function store(ProductCategoryRequest $request){
        $productCategory=ProductCategory::create($request->all());
       if($request->hasFile('image')){
        $image = $request->file('image')->store('public/productCategory');

        $productCategory->image = str_replace('public/', '', $image);
        $productCategory->save();
       }
        return redirect()->route('productCategory.index')->with('success', 'productCategory  created successfully.');
    }

    public function edit(ProductCategory $productCategory){

        return view('productcategory.create',compact('productCategory'));
    }

    public function update(ProductCategory $productCategory , ProductCategoryRequest $request){
        $productCategoryData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/productCategory');
            $productCategoryData['image'] = str_replace('public/', '', $imagePath);
        }

        $productCategory->update($productCategoryData);

        return redirect()->route('productCategory.index')->with('success', 'productCategory item successfully updated');
    }


    public function delete(productCategory $productCategory){
        $productCategory->delete();
        return redirect()->route('productCategory.index')->with('error','Successfully  productCategory items deleted');

    }
    public function duplicate(productCategory $productCategory){
        $productDuplicate=$productCategory->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
