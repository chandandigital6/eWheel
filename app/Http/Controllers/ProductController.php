<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ProductController extends Controller
{


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
        $categories = ProductCategory::all();
        return view('product.create',compact('categories'));
    }

    public function store(ProductRequest $request)
{
    // dd($request->all());
    // Validate the request using the ProductRequest
    $validated = $request->validated();

    $data = $validated; // Start with validated data
    $imagePaths = [];   // Initialize the array to hold image paths

    // Handle image upload
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $image) {
            $imagePaths[] = $image->store('products', 'public'); // Store images in the 'products' folder
        }
        $data['image'] = implode(',', $imagePaths); // Convert array to a comma-separated string
    }

    // Save the product to the database
    Product::create($data);

    // Redirect to the product index page with success message
    return redirect()->route('product.index')->with('success', 'Product created successfully.');
}


    public function edit( $product)
    {
        $product = Product::with('category')->findOrFail($product);
        $categories = ProductCategory::all();
        return view('product.create', compact('product','categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate incoming request
        $validated = $request->validated();

        // Prepare data for updating
        $data = $validated;

        // Handle images
        $existingImages = $product->image ? explode(',', $product->image) : [];

        // Process new images if provided
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $newImages[] = $image->store('products', 'public'); // Store new images
            }

            // Merge existing and new images
            $allImages = array_merge($existingImages, $newImages);
            $data['image'] = implode(',', $allImages); // Save as comma-separated string
        } else {
            // If no new images uploaded, retain existing ones
            $data['image'] = implode(',', $existingImages);
        }

        // Update the product
        $product->update($data);

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
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
