<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $appends = ['products_count', 'sub_categories_count'];

    public function products(){

        return $this->hasMany(Product::class);

    }

    public function subCategories(){

        return $this->hasMany(SubCategory::class);

    }

    public function getProductsCountAttribute(){

        return $this->products()->count();

    }

    public function getSubCategoriesCountAttribute(){

        return $this->subCategories()->count();

    }
}
