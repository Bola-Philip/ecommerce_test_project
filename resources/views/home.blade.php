@extends('layouts.master')

@section('title', 'Welcome to Our Store')

@section('content')

    <div class="container my-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="feature">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price: ${{ number_format($product->price, 2) }}</strong></p>
                        <p>Stock: {{ $product->stock }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="text-center py-4">
        <p>&copy; {{ date('Y') }} Your Company Name. All Rights Reserved.</p>
    </footer>

@endsection
