<?php

namespace App\Filters;

use Carbon\Carbon;
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
    public function available(string $availability)
    {
        $checkIfAvailable = $availability == 'Yes';

        if ($checkIfAvailable) {

            $this->builder->where('available', 1);

        } else {

            $this->builder->where('available', 0);

        }
    }

    public function createdFrom(string $createdFrom)
    {
        $this->builder->where('created_at', '>=', $createdFrom);
    }

    public function createdTo(string $createdTo)
    {
        $this->builder->where('created_at', '<=', Carbon::create($createdTo)->addDay());
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
    public function name(string $name)
    {
        $this->builder->where('name', 'like', "%" . $name . "%");
    }

    public function availableColors(string $availableColors)
    {
        $this->builder->where('available_colors', 'like', "%" . $availableColors . "%");
    }

    public function availableSizes(string $availableSizes)
    {
        $this->builder->where('available_sizes', 'like', "%" . $availableSizes . "%");
    }

    public function class(string $class)
    {
        $this->builder->where('class', $class);
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
