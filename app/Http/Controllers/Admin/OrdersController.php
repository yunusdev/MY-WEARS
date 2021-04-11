<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AccountContract;
use App\Contracts\OrderContract;
use App\Contracts\OrderItemContract;
use App\Events\OrderCompletedEvent;
use App\Filters\OrderFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //

    private $orderRepository, $accountRepository, $orderItemRepository;

    public function __construct(OrderContract $orderRepository,
                                AccountContract $accountRepository, OrderItemContract $orderItemRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->accountRepository = $accountRepository;
        $this->orderItemRepository = $orderItemRepository;
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

            $order = $this->orderRepository->updateStatus($order, $request['status']);
            if ($request['status'] === 'Delivered') event(new OrderCompletedEvent($order));
            return $order;

        }catch (\Throwable $throwable){

            throw $throwable;
        }

    }


    public function create(){

        $data[''] = '';
        return view('admin.orders.create')->with($data);

    }

    public function store(OrderRequest $request)
    {

        try{

            DB::beginTransaction();

            $inOrder = $request['order'];
            $inOrderItems = $request['items'];

            $inOrder['user_created'] = false;
            $order = $this->orderRepository->createUserOrder($inOrder, false);
            if ($order->user_id) {
                $this->accountRepository->updateOrCreateUserAddress($inOrder, $order->user_id);
                $this->accountRepository->createOrUpdateUserPhone($inOrder, $order->user_id);
            }

            $orderItems = $this->orderItemRepository->createOrderItems($order, $inOrderItems);
            Cache::put('message_success_admin', 'Order created successfully!', now()->addSeconds(10));

            DB::commit();

            return response()->json([
                'order' => $order,
                'order_items' => $orderItems

            ]);

        }catch (\Throwable $throwable){

            DB::rollback();

            throw $throwable;
        }

    }
}
