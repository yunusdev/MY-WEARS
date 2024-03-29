<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Product extends Model
{
    //    use HasFactory, Searchable, Filterable;
    use HasFactory, Filterable;

    protected $appends = ['formatted_date', 'order_items_count', 'sizes', 'colors', 'is_wishlisted'];

    public function category()
    {

        return $this->belongsTo(Category::class);

    }

    public function subCategory()
    {

        return $this->belongsTo(SubCategory::class);

    }

    public function productImages()
    {

        return $this->hasMany(ProductsImage::class);

    }

    public function orderItems()
    {

        return $this->hasMany(OrderItem::class);

    }

    public function getOrderItemsCountAttribute()
    {

        return $this->orderItems()->sum('quantity');

    }

    public function getFormattedDateAttribute()
    {

        return $this->created_at->diffForHumans();

    }

    public function getSizesAttribute()
    {

        return explode(',', $this->available_sizes);

    }

    public function getColorsAttribute()
    {

        return explode(',', $this->available_colors);

    }

    public function wishlists()
    {

        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();

    }

    public function isWishlisted()
    {

        return $this->wishlists()->where('user_id', auth()->id())->count() > 0;
    }

    public function getIsWishlistedAttribute()
    {

        return $this->isWishlisted();
    }

    public function getWishlistsCountsAttribute()
    {

        return $this->wishlists->count();
    }

}
