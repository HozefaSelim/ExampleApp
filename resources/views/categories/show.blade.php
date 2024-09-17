@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $category->name }}</h2>
                <p class="card-text">{{ $category->description }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
