<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends QueryFilter
{


    public function createdFrom(string $createdFrom)
    {
        $this->builder->where('created_at', '>=', $createdFrom);
    }

    public function createdTo(string $createdTo)
    {
        $this->builder->where('created_at', '<=', Carbon::create($createdTo)->addDay());
    }


    public function name(string $name)
    {
        $this->builder
            ->where('name', 'like', "%" . $name . "%");
    }

    public function email(string $email)
    {
        $this->builder
            ->where('email', 'like', "%" . $email . "%");
    }

    public function phone(string $phone)
    {
        $this->builder
            ->where('phone', 'like', "%" . $phone . "%");
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
