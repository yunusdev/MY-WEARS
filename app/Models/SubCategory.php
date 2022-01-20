<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $appends = ['products_count'];

    public function category()
    {

        return $this->belongsTo(Category::class);

    }


    public function products()
    {

        return $this->hasMany(Product::class);

    }

    public function getProductsCountAttribute()
    {

        return $this->products()->count();

    }
}
