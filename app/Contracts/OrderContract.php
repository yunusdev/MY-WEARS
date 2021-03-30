<?php


namespace App\Contracts;


use App\Filters\OrderFilter;
use App\Models\Order;

interface OrderContract
{

    public function getOrders();

    public function filterOrders(OrderFilter $filters, int $pagination = 10);

    public function getUserOrders(string $userId = null, array $relationship = []);

    public function createUserOrder(array $params);

    public function updateStatus(Order $order, string $status);

    public function getOrderByTrackingNumber(string $tracking_number, array $relationship = [], $user = true);

    public function getOrderById(string $orderId, array $relationship = []);

}
