<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $appends = ['formatted_date'];

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function subCategory(){

        return $this->belongsTo(SubCategory::class);

    }

    public function productImages(){

        return $this->hasMany(ProductsImage::class);

    }

    public function getFormattedDateAttribute(){

        return $this->created_at->diffForHumans();

    }
}
