<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends QueryFilter
{
    /**
     * @param string $trackingNumber
     * @return void
     */
    public function trackingNumber(string $trackingNumber)
    {
        $this->builder->where('tracking_number', $trackingNumber);
    }

    /**
     * @param string $minAmount
     * @return void
     */
    public function minAmount(string $minAmount)
    {
        $this->builder->where('price', '>=', $minAmount);
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
