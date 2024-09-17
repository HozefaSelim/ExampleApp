@extends('welcome')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Register</h2>

                <!-- عرض الأخطاء إذا كانت موجودة -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    

            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
                    <div class="form-group mb-3">
                        <label for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
