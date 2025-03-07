<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Your Store</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Categories</a>
                    </li>
                </ul>

                <form class="search-filter-container d-flex flex-wrap" action="{{ route('home') }}" method="GET">
                    <div class="search-input-group d-flex flex-wrap">
                        <div class="search-field">
                            <input type="text"
                                   class="form-control"
                                   placeholder="Search products..."
                                   name="search"
                                   value="{{ request('search') }}">
                        </div>

                        <div class="category-field">
                            <select class="form-control" name="category_id">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="price-field-group d-flex">
                            <input type="number"
                                   class="form-control"
                                   placeholder="Min"
                                   name="min_price"
                                   value="{{ request('min_price') }}"
                                   min="0"
                                   step="0.01">
                            <span class="text-light mx-1">-</span>
                            <input type="number"
                                   class="form-control"
                                   placeholder="Max"
                                   name="max_price"
                                   value="{{ request('max_price') }}"
                                   min="0"
                                   step="0.01">
                        </div>

                        <button class="btn btn-outline-light search-button" type="submit">
                            <i class="fas fa-search"></i>
                            <span class="d-none d-sm-inline">Search</span>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-light"></span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown">
                                <!-- User Icon -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-box"></i> Orders
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

@if(Route::currentRouteName() == 'home')
    <header class="hero">
        <div class="container">
            <h1>Welcome to Our Store</h1>
            <p class="lead">Your one-stop shop for everything!</p>
            <a href="#featured-products" class="btn btn-light btn-lg">Shop Now</a>
        </div>
    </header>
@endif
