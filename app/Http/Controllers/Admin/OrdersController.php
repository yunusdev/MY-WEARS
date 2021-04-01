<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Filters\OrderFilter;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //

    private $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrderStatus(){

        return ['Initiated', 'Processing', 'Prepared', 'Shipped', 'Delivered', 'Cancelled'];

    }

    public function index(){

        $data['title'] = 'Orders';
        return view('admin.orders.index')->with($data);

    }

    public function getOrders(Request $request){

//        if (!(isset($request['orderByAsc']) && isset($request['orderByDesc']))) $request['orderByDesc'] = 'created_at';

        $filters = new OrderFilter($request);
        return $this->orderRepository->filterOrders($filters, 10);

    }

    public function show($tracking_number){

        $data['tracking_number'] = $tracking_number;
        $data['statuses'] = $this->getOrderStatus();
        $data['order'] = $this->orderRepository->getOrderByTrackingNumber($tracking_number, ['orderItems.product'], false);
        return view('admin.orders.show')->with($data);

    }

    public function updateStatus(Request $request, Order $order){

        try {

            $this->validate($request, [

                'status' => 'required'

            ]);

            return $this->orderRepository->updateStatus($order, $request['status']);

        }catch (\Throwable $throwable){

            throw $throwable;
        }

    }
}
