<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SearchTrait; // Use the HasFactory trait for factory support

    // Define the table associated with the model if it's not the plural form of the model name
    protected $table = "products"; // Optional, only if your table name is not 'products'

    // Specify the fillable attributes
    protected $fillable = ["name", "description", "price", "stock", 'status', 'status_updated_at'];

    // Define any relationships, for example, if a product belongs to a category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // If a product has many order items
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // You may include other methods and scopes as needed
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    //get the average ratings
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    //round the average rating so if it's like 4.5000 make it 4.5
    public function getRoundedAverageRatingAttribute(): float
    {
        return round($this->average_rating, 1);
    }

    //total users who gave a rating
    public function getTotalReviewsAttribute(): int
    {
        return $this->reviews()->count();
    }
}
