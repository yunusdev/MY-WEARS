<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    /**
     * @param string $productCategory Product Category
     *
     * @return void
     */
    public function category(string $productCategory)
    {
        $this->builder->where('category_id', $productCategory);
    }

    /**
     * @param string $productSubCategory
     * @return void
     */
    public function subCategory(string $productSubCategory)
    {
        $this->builder->where('sub_category_id', $productSubCategory);
    }

    /**
     * @param string $availability
     *
     * @return void
     */
    public function availability(string $availability)
    {
        $this->builder->where('available', $availability);

//        $checkIfAvailable = $availability == 'yes' ? true : false;
//
//        if ($checkIfAvailable) {
//            $this->builder->where('available', 0);
//        } else {
//            $this->builder->where('available', 0);
//        }
    }

    /**
     * @param string $maxPrice
     *
     * @return void
     */
    public function maxPrice(string $maxPrice)
    {
        $this->builder->where('price', '<=', $maxPrice);
    }

    /**
     * @param string $color
     *
     * @return void
     */
    public function color(string $color)
    {
        $this->builder->where('available_colors', 'like', "%" . $color . "%");
    }

    /**
     * @param string $name
     * @return void
     */
    public function productName(string $name)
    {
        $this->builder->where('name', 'like', "%" . $name . "%");
    }

    /**
     * @param string $minPrice
     *
     * @return void
     */
    public function minPrice(string $minPrice)
    {
        $this->builder->where('price', '>=', $minPrice);
    }

    /**
     * @param string $orderBy
     * @return void
     */
    public function orderByAsc(string $orderBy)
    {
        $this->builder->orderBy($orderBy, 'asc');
    }

    /**
     * @param string $orderBy
     * @return void
     */
    public function orderByDesc(string $orderBy)
    {
        $this->builder->orderBy($orderBy, 'desc');
    }

}
