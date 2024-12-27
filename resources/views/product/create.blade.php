@extends('layouts.aap')

@section('content')
<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @if(isset($product))
                    @method('PUT')
                @endif --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $product->title ?? '') }}" placeholder="Enter product title" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sku_number" class="form-label">SKU Number <span class="text-danger">*</span></label>
                        <input type="text" id="sku_number" name="sku_number" class="form-control @error('sku_number') is-invalid @enderror"
                               value="{{ old('sku_number', $product->sku_number ?? '') }}" placeholder="Enter SKU number" required>
                        @error('sku_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class=" mb-3">
                    <label for="sub_title" class="form-label">SubTitle <span class="text-danger">*</span></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror"
                           value="{{ old('sub_title', $product->sub_title ?? '') }}" placeholder="Enter SubTItle" required>
                    @error('sub_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea id="short_description" name="short_description" class="form-control textarea @error('short_description') is-invalid @enderror"
                              placeholder="Enter short description">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                    @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="long_description" class="form-label">Long Description</label>
                    <textarea id="long_description" name="long_description" class="form-control  textarea @error('long_description') is-invalid @enderror"
                              placeholder="Enter long description">{{ old('long_description', $product->long_description ?? '') }}</textarea>
                    @error('long_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="accessories" class="form-label"> accessories</label>
                    <textarea id="accessories" name="accessories" class="form-control textarea @error('accessories') is-invalid @enderror"
                              placeholder="Enter long description">{{ old('accessories', $product->accessories ?? '') }}</textarea>
                    @error('accessories')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                 <!-- Features -->
                 @for ($i = 1; $i <= 6; $i++)
                 <div class="mb-3">
                     <label for="f_{{ $i }}" class="form-label">Feature {{ $i }}</label>
                     <input type="text" class="form-control @error('f_{{ $i }}') is-invalid @enderror" id="f_{{ $i }}" name="f_{{ $i }}" value="{{ old("f_$i", $product["f_$i"] ?? '') }}">
                     @error("f_$i")
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
             @endfor

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror"
                               value="{{ old('qty', $product->qty ?? '') }}" placeholder="Enter quantity">
                        @error('qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price', $product->price ?? '') }}" placeholder="Enter price">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="product_category_id" class="form-label">Category</label>
                        <select id="product_category_id" name="product_category_id" class="form-control @error('product_category_id') is-invalid @enderror">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" id="image" name="image[]" class="form-control @error('image.*') is-invalid @enderror" multiple onchange="previewImages(event)">

                    <!-- Preview selected images -->
                    <div id="image-preview" class="mt-3 d-flex flex-wrap"></div>

                    <!-- Show existing images if available -->
                    @if(isset($product) && $product->image)
                        <div class="mt-3 d-flex flex-wrap">
                            @foreach(explode(',', $product->image) as $image)
                                <div class="me-2 mb-2">
                                    <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @error('image.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas {{ isset($product) ? 'fa-edit' : 'fa-plus' }}"></i>
                    {{ isset($product) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
</div>

<script>
   function previewImages(event) {
    const files = event.target.files; // Get selected files
    const previewContainer = document.getElementById('image-preview');
    previewContainer.innerHTML = ''; // Clear previous previews

    // Loop through selected files
    Array.from(files).forEach(file => {
        if (file && file.type.startsWith('image/')) { // Ensure the file is an image
            const reader = new FileReader();

            reader.onload = function(e) {
                // Create and style the image element
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.margin = '5px';
                img.className = 'img-thumbnail';

                // Append the image to the preview container
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file); // Read file as Base64 URL
        }
    });
}


</script>
@endsection
