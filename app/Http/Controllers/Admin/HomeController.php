<?php

namespace App\Http\Controllers\Admin;


use App\Contracts\OrderItemContract;
use App\Contracts\OrderStatContract;
use App\Contracts\ProductContract;
use App\Models\Admin\Admin;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    private $orderStatRepository, $prodRepository;

    public function __construct(OrderStatContract $orderStatRepository, ProductContract $prodRepository)
    {
        $this->orderStatRepository = $orderStatRepository;
        $this->prodRepository = $prodRepository;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::get()->take(4);
        $data['counts'] = $this->orderStatRepository->getDataCounts();
        $data['top_products'] = $this->prodRepository->getTopSellingProductsAndTotalAmount(10);

        return view('admin.home')->with($data);

    }

    public function groupOrdersByWeekDay(){

        return $this->orderStatRepository->aggregateOrdersByWeekDay(false);

    }

    public function groupOrdersByMonth(){

        return $this->orderStatRepository->aggregateOrdersByMonth(false);

    }

    public function test(){

//        WEEK NUM
        return $this->prodRepository->getTopSellingProductsAndTotalAmount();


    }
}
