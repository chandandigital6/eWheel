<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryTitle;
use Illuminate\Http\Request;

class ProductCategoryTitleController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $productCategoryTitle = ProductCategoryTitle::query();

        if (!empty($keyword)) {
            $productCategoryTitle->where('title', 'like', "%$keyword%");
        }
         $productCategoryTitleData = $productCategoryTitle->paginate(5);

        return view('productcategorytitle.index',compact('productCategoryTitleData'));
    }

    public function create(){
        return view('productcategorytitle.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        ProductCategoryTitle::create($validated);
        return redirect()->route('productCategoryTitle.index')->with('success', 'productCategoryTitle  created successfully.');
    }

    public function edit(ProductCategoryTitle $productCategoryTitle){

        return view('productcategorytitle.create',compact('productCategoryTitle'));
    }

    public function update(Request $request, $productCategoryTitle ){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        $title = ProductCategoryTitle::findOrFail($productCategoryTitle);
        $title->update(attributes: $validated);
        return redirect()->route('productCategoryTitle.index')->with('success', 'productCategoryTitle item successfully updated');
    }


    public function delete(productCategoryTitle $productCategoryTitle){
        $productCategoryTitle->delete();
        return redirect()->route('productCategoryTitle.index')->with('error','Successfully  productCategoryTitle items deleted');

    }
    public function duplicate(productCategoryTitle $productCategoryTitle){
        $productDuplicate=$productCategoryTitle->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
