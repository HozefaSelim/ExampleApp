<header class="bg-primary p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="text-white h4 mb-0">
            <a href="/" class="text-white text-decoration-none">My Laravel App</a>
        </div>
        <nav>
            <a href="{{ route('products.index') }}" class="text-white text-decoration-none me-3">Products</a>
            <a href="{{ route('categories.index') }}" class="text-white text-decoration-none me-3">Category</a>
            <a href="{{ route('tags.index') }}" class="text-white text-decoration-none me-3">Tag</a>

            @auth
            <span class="text-white text-decoration-none me-3">Wellcome , {{ auth()->user()->name }}</span>
           
            @if (auth()->user()->isAdmin())
                <a href="{{ route('dashboard') }}" class="text-white text-decoration-none me-3">Dashborad</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
              
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>

            @if (auth()->user()->image)
                <img src="{{ asset('images/users/' . auth()->user()->image) }}" alt="{{ auth()->user()->image }}" 
                class="img-fluid rounded-circle"
                style="width: 50px; height: auto;">
            @else
                <img src="{{ asset('images/users/default.jpeg') }}" alt="default image"
                class="img-fluid rounded-circle"
                style="width: 50px; height: auto;">
            @endif
         
               
            @else
            <a href="{{ route('login') }}" class="text-white text-decoration-none me-3">Login</a>
            <a href="{{ route('register') }}" class="text-white text-decoration-none me-3">Register</a>
                <img src="{{ asset('images/users/no_user.jpeg') }}" alt="default image"
                class="img-fluid rounded-circle"
            style="width: 50px; height: auto;">
          @endauth


        </nav>
    </div>
</header>
