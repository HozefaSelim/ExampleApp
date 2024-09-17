@extends('welcome')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4">List</h1>
            <a href="{{ route('tags.create') }}" class="btn btn-success">Add New Tag</a>
        </div>

        <!-- tags Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>

                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $tag->name }}</td>

                        <td>
                            <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
