@extends('layouts.master')

@section('title', $product->name)

@section('content')
    <div class="product-container">
        <h1 class="product-title">{{ $product->name }}</h1>

        <div class="product-description">
            <p>{{ $product->description }}</p>
        </div>

        <div class="price-section">
            <div class="price">
                Price: ${{ $product->price }}
            </div>
        </div>

        <div class="rating-summary">
            <div class="average-rating">
                <div class="rating-stars">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $product->rounded_average_rating ? 'filled' : '' }}">★</span>
                    @endfor
                </div>
                <div class="rating-text">
                    {{ $product->rounded_average_rating }} out of 5
                    <span class="review-count">({{ $product->total_reviews }} {{ Str::plural('review', $product->total_reviews) }})</span>
                </div>
            </div>
        </div>

        <div class="reviews-section">
            <h2 class="reviews-title">Write a Review</h2>
            <form class="review-form" method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label>Rating</label>
                    <div class="star-rating">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"{{ old('rating') == $i ? 'checked' : '' }}/>
                            <label for="star{{ $i }}" title="{{ $i }} star{{ $i != 1 ? 's' : '' }}">★</label>
                        @endfor
                    </div>
                    @error('rating')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="comment">Your Review</label>
                    <textarea id="comment" name="comment" placeholder="Write your review here..." minlength="10" maxlength="500">{{ old('comment') }}</textarea>
                    @error('comment')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="button primary-button">Submit Review</button>
            </form>
        </div>

        <div class="customer-reviews">
            <h2 class="reviews-title">Customer Reviews</h2>
            @forelse($product->reviews as $review)
                <div class="review">
                    <div class="review-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                        @endfor
                    </div>
                    <div class="review-comment">
                        <p>{{ $review->comment }}</p>
                    </div>
                    <div class="review-author">
                        <small>by {{ $review->user->name }} on {{ $review->created_at->format('F j, Y') }}</small>
                    </div>
                </div>
            @empty
                <p>No reviews yet. Be the first to review this product!</p>
            @endforelse
        </div>
    </div>
@endsection
