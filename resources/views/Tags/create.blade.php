@extends('welcome')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tags.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>


            <button type="submit" class="btn btn-primary">Create Tag</button>
        </form>
    </div>
@endsection
