<?php

namespace App\Http\Controllers\Admin;


use App\Contracts\OrderItemContract;
use App\Contracts\OrderStatContract;
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
    private $orderStatRepository;

    public function __construct(OrderStatContract $orderStatRepository)
    {
        $this->orderStatRepository = $orderStatRepository;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::get()->take(4);
        $data['counts'] = $this->orderStatRepository->getDataCounts();

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
//        return $this->orderStatRepository->aggregateOrdersByWeekNumber(true, 2021);


    }
}
