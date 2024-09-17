@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $tag->name }}</h2>



                <a href="{{ route('tags.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
