<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\MissionVision;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryTitle;
use App\Models\Retail;
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


    public function retail()
    {
        $retails=Retail::all();
        return view('frontend.retail',compact('retails'));
    }
    public function contact()
    {
        $contacts=Contact::all();
        return view('frontend.contact',compact('contacts'));
    }


    public function thankyou()
    {

        return view('frontend.thankyou');
    }


}
