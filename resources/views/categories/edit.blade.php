@extends('welcome')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $category->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
