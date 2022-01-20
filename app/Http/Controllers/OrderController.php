<?php

namespace App\Http\Controllers;

use App\Contracts\AccountContract;
use App\Contracts\CartContract;
use App\Contracts\CouponContract;
use App\Contracts\OrderContract;
use App\Contracts\OrderItemContract;
use App\Contracts\ProductContract;
use App\Events\OrderInitiatedEvent;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //

    private $orderRepository, $orderItemRepository, $cartRepository, $productRepository, $accountRepository, $couponRepository;

    public function __construct(OrderContract $orderRepository, ProductContract $productRepository, AccountContract $accountRepository,
        OrderItemContract $orderItemRepository, CartContract  $cartRepository, CouponContract $couponRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->productRepository = $productRepository;
        $this->accountRepository = $accountRepository;
        $this->couponRepository = $couponRepository;

    }

    public function getUserOrders()
    {

        return $this->orderRepository->getUserOrders();

    }

    public function index()
    {

        $data['trending_products'] = $this->productRepository->getTrendingProducts();
        return view('account.orders.index')->with($data);

    }

    public function show($tracking_number)
    {

        $data['order'] = $this->orderRepository->getOrderByTrackingNumber($tracking_number, ['orderItems.product', 'coupon']);

        if (!$data['order']) { return redirect('/');
        }

        return view('account.orders.show')->with($data);

    }

    public function create(OrderRequest $request)
    {
        $url = env('APP_URL');
        $name = ''; $is_auth = false;
        try{

            DB::beginTransaction();

            $inOrder = $request['order'];
            $inOrderItems = $request['items'];

            $order = $this->orderRepository->createUserOrder($inOrder);
            $this->couponRepository->userRedeemCoupon($order);
            if (!Auth::guest()) {
                $this->accountRepository->updateOrCreateUserAddress($inOrder);
                $this->accountRepository->createOrUpdateUserPhone($inOrder);
                $name = auth()->user()->name;
                $is_auth = true;
            }
            $orderItems = $this->orderItemRepository->createOrderItems($order, $inOrderItems);
            $this->cartRepository->clearUserCart();
            event(new OrderInitiatedEvent($order, $inOrderItems, $name, $is_auth, $url));
            Cache::put('message_success', 'Order completed successfully!', now()->addSeconds(10));

            DB::commit();

            return response()->json(
                [
                'order' => $order,
                'order_items' => $orderItems

                ]
            );

        }catch (\Throwable $throwable){

            DB::rollback();

            throw $throwable;
        }

    }

}
