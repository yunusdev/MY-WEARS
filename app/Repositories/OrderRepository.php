<?php

namespace App\Repositories;

use App\Contracts\OrderContract;
use App\Filters\OrderFilter;
use App\Models\Order;
use App\Utils\RandomStringGenerator;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends BaseRepository implements OrderContract
{
    //
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getOrders()
    {
        return $this->allPaginate(9, 'created_at', 'desc',  []);

    }

    public function getOrdersCount()
    {
        return $this->count();
    }


    public function filterOrders(OrderFilter $filters, int $pagination = 10)
    {
        return $this->filter($filters, $pagination, []);
    }

    public function getUserOrders(string $userId = null, $numPaginate = 10, array $relationship = [])
    {
        if (!$userId) $userId = auth()->id();

        return $this->paginate(['user_id' => $userId], $numPaginate);
    }

    public function createUserOrder(array $params, bool $userCreated = true)
    {

        if ($userCreated && Auth::check()){
            $params['user_id'] = auth()->id();
        }
        $random = new RandomStringGenerator();
        $params['tracking_number'] = $random->generate(6);
        return $this->create($params);

    }

    public function updateStatus(Order $order, string $status)
    {
        $order->status = $status;
        $order->save();



        return $order;
    }


    public function getOrderByTrackingNumber(string $tracking_number, array $relationship = [], $user = true)
    {

        $query = ['tracking_number' => $tracking_number];
        if ($user) $query['user_id'] = auth()->id();
        return $this->findOneBy($query, $relationship);
    }

    public function getOrderById(string $orderId, array $relationship = [])
    {

        return $this->findOneBy(['id' => $orderId], $relationship);
    }


}
