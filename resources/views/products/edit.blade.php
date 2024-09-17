@extends('welcome')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}"
                    style="width: 75px; height: auto;">
                <input type="file" class="form-control" id="image" name="image">
            </div>


            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            @if ($tags->count() > 0)
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select multiple class="form-control" id="tags" name="tags[]">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
