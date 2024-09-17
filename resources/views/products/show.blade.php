@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="card-text mt-3">{{ $product->description }}</p>
                <p class="card-text">Price: ${{ $product->price }}</p>
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}"
                    style="width: 175px; height: auto;">

                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
