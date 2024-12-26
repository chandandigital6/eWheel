<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ProductController extends Controller
{

    public function showQr($id)
{
    $product = Product::findOrFail($id);

    // Prepare product details as a string
    $productDetails = "Product Title: {$product->title}\n"
        . "Subtitle: {$product->sub_title}\n"
        . "SKU: {$product->sku_number}\n"
        . "Price: {$product->price}\n"
        . "Quantity: {$product->qty}\n"
        . "Description: {$product->short_description}";

    // Generate and save the QR code as an image
    $imagePath = "qr-codes/product-123.png";
    Storage::disk('public')->put($imagePath, QrCode::format('png')->size(200)->generate('Product details go here'));

    return back()->with('success', 'QR Code generated successfully!');
}
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $product = Product::query();

        if (!empty($keyword)) {
            $product->where('title', 'like', "%$keyword%");
        }
        $productData = $product->paginate(5);

        return view('product.index', compact('productData'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        //        dd($request);

        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'product  created successfully.');
    }

    public function edit(Product $product)
    {

        return view('product.create', compact('product'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $productData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/product');
            $productData['image'] = str_replace('public/', '', $imagePath);
        }

        $product->update($productData);

        return redirect()->route('product.index')->with('success', 'product item successfully updated');
    }


    public function delete( $product)
    {
        $product = Product::findOrFail($product);

        // Check if the product has an image and delete it
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product record from the database
        $product->delete();
        return redirect()->route('product.index')->with('error', 'Successfully  product items deleted');
    }
    public function duplicate(Product $product)
    {
        $productDuplicate = $product->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
