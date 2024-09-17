@extends('welcome')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4">Product List</h1>

            @if (auth()->user()->isAdmin())
            <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
            @endif
        </div>

        <!-- Products Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}"
                                    style="width: 75px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            @foreach ($product->tags as $tag)
                                <span class="badge bg-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                          
                          <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                          @if (auth()->user()->isAdmin())
                          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
