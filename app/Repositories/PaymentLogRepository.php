<?php

namespace App\Repositories;

use App\Contracts\PaymentLogContract;
use App\Contracts\UserContract;
use App\Filters\UserFilter;
use App\Models\PaymentLog;

class PaymentLogRepository extends BaseRepository implements PaymentLogContract
{
    //
    public function __construct(PaymentLog $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function createPaymentLog(array $params)
    {
        return $this->create($params);
    }

}
