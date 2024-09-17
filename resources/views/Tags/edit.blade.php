@extends('welcome')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">tag Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update tag</button>
        </form>
    </div>
@endsection
