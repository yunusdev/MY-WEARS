<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends QueryFilter
{
    /**
     * @param  string $maxAmount
     * @return void
     */
    public function maxAmount(string $maxAmount)
    {
        $this->builder->where('total_amount', '<=', $maxAmount);
    }

    /**
     * @param  string $minAmount
     * @return void
     */
    public function minAmount(string $minAmount)
    {
        $this->builder->where('total_amount', '>=', $minAmount);
    }

    /**
     * @param  string $trackingNumber
     * @return void
     */
    public function trackingNumber(string $trackingNumber)
    {
        $this->builder->where('tracking_number', $trackingNumber);
    }

    /**
     * @param  string $status
     * @return void
     */
    public function status(string $status)
    {
        $this->builder->where('status', $status);
    }


    public function isCoupon(string $isCoupon)
    {

        $checkIfCoupon = $isCoupon == 'Yes';

        if ($checkIfCoupon) {

            $this->builder->where('coupon_id', '!=', null);

        } else {

            $this->builder->where('coupon_id', null);

        }


    }

    public function isRegisteredUser(string $isRegisteredUser)
    {

        $checkIfRegUser = $isRegisteredUser == 'Yes';

        if ($checkIfRegUser) {

            $this->builder->where('user_id', '!=', null);

        } else {

            $this->builder->where('user_id', null);

        }


    }

    public function user(string $user)
    {
        $this->builder->where('user_id', $user);
    }

    public function coupon(string $coupon)
    {
        $this->builder->where('coupon_id', $coupon);
    }

    public function createdFrom(string $createdFrom)
    {
        $this->builder->where('created_at', '>=', $createdFrom);
    }

    public function createdTo(string $createdTo)
    {
        $this->builder->where('created_at', '<=', Carbon::create($createdTo)->addDay());
    }

    public function userInfo(string $userinfo)
    {
        $this->builder
            ->where('name', 'like', "%" . $userinfo . "%")
            ->orWhere('email', 'like', "%" . $userinfo . "%");
    }

    public function location(string $location)
    {
        $this->builder
            ->where('state', 'like', "%" . $location . "%")
            ->orWhere('lga', 'like', "%" . $location . "%")
            ->orWhere('country', 'like', "%" . $location . "%");
    }

    /**
     * @param  string $orderBy
     * @return void
     */
    public function orderByDesc(string $orderBy)
    {
        $this->builder->orderBy($orderBy, 'desc');
    }

    /**
     * @param  string $orderBy
     * @return void
     */
    public function orderByAsc(string $orderBy)
    {
        $this->builder->orderBy($orderBy, 'asc');
    }

}
