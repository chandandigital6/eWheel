<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\MissionVision;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryTitle;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        $aboutUs = About::all();
        $productCategoryTitle = ProductCategoryTitle::all();
        $productCategories = ProductCategory::all(); // Fetch categories with images
        $products = Product::with('category')->get();
       $testimonials=Testimonial::all();
       $contacts=Contact::all();
       $productTitle=MissionVision::all();
        return view('frontend.index', compact('banners', 'aboutUs', 'productCategoryTitle', 'productCategories','products','testimonials','contacts','productTitle'));
    }


    public function show($id)
{
    // dd($id);
    $category = ProductCategory::with('products')->findOrFail($id);
    return view('frontend.categorydetails',compact(var_name: 'category'));
    // return view('frontend.category-details', compact('category'));
}

public function productdetail($id)
{
    // Fetch product with its category
    $product = Product::with('category')->findOrFail($id);

    // Fetch related products by the same category, excluding the current product
    $relatedProducts = Product::where('product_category_id', $product->product_category_id)
        ->where('id', '!=', $product->id) // Exclude current product
        ->take(5) // Limit the number of related products
        ->get();

    // dd($relatedProducts); // Debug the related products
    return view('frontend.productdetail', compact('product', 'relatedProducts'));
}



    public function e_bike()
    {
        return view('frontend.e_bike');
    }

    public function e_scooter()
    {
        return view('frontend.e_scooter');
    }
    public function e_unicycle()
    {
        return view('frontend.e_unicycle');
    }

    public function e_wheelchair()
    {
        return view('frontend.e_wheelchair');
    }

    public function accessories()
    {
        return view('frontend.accessories');
    }
    public function retail()
    {
        return view('frontend.retail');
    }
    public function contact()
    {
        return view('frontend.contact');
    }


}
