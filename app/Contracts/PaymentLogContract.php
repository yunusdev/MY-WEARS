<?php

namespace App\Contracts;

use App\Filters\UserFilter;
use App\Models\Product;

interface PaymentLogContract
{

    public function createPaymentLog(array $params);

}
