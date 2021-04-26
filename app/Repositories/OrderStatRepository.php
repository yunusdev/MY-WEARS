<?php

namespace App\Repositories;

use App\Contracts\OrderContract;
use App\Contracts\OrderStatContract;
use App\Contracts\ProductContract;
use App\Contracts\UserContract;
use App\Models\Admin\Admin;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderStatRepository extends BaseRepository implements OrderStatContract
{
    //

    private $orderRepository, $productRepository, $userRepository;


    public function __construct(Order $model, OrderContract $orderRepository,
                                ProductContract $productRepository, UserContract $userRepository)
    {
        parent::__construct($model);
        $this->model = $model;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->userRepository =    $userRepository;
    }

    public function getDataCounts(): array
    {

        $count['admins'] = Admin::get()->count();
        $count['products'] = $this->productRepository->getProductsCount();
        $count['orders'] = $this->orderRepository->getOrdersCount();
        $count['users'] = $this->userRepository->getUsersCount();

        return $count;

    }

    public function getOrderStatistics($by = null, $createdFrom = null, $createdTo = null, $status = null)
    {

        $query = $this->model->query();

        if ($status) $query = $query->where('status', $status);

        if ($by === 'week'){

//            $query = $query->whereBetween('created_at', [
//            Carbon::parse('last monday')->startOfDay(),
//                Carbon::parse('next sunday')->endOfDay(),
//            ]);

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ]);

        }elseif ($by === 'month'){

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ]);

        }elseif ($by === 'custom'){

            $query = $query->whereBetween('created_at', [
                Carbon::create($createdFrom)->startOfDay(),
                Carbon::create($createdTo)->endOfDay(),
            ]);

        }
         $data = $query
            ->select(DB::raw("count(*) AS count,  sum(total_amount) as totalAmt, sum(number_of_items) as numOfItems,
            sum(delivery_fee) as deliveryFee, sum(sub_total_amount) as subTotalAmount, sum(coupon_discount) as couponDiscount"))
            ->get();

        return $data[0];
    }

    public function aggregateOrdersByMonth(bool $totalAmount = true, $year = null){

        $query = $this->model->query();

        if ($year) $query = $query->whereYear('created_at', $year);

//        return $query
//            ->select(DB::raw("count(*) AS count,  IF('$totalAmount', sum(total_amount), sum(total_amount - delivery_fee))
//             as earnings, DATE_FORMAT(created_at, '%M') as YearMonth"))
//            ->groupBy('YearMonth')
//            ->get();
        return $query
            ->select(DB::raw("count(*) AS count,  sum(total_amount) as totalAmt,
            sum(total_amount - delivery_fee) as earnings, DATE_FORMAT(created_at, '%M') as month"))
            ->groupBy('month')
            ->get();


    }

    public function aggregateOrdersByDay(bool $totalAmount = true, $by = null, $year = null){

        $query = $this->model->query();

        if ($year) $query = $query->whereYear('created_at', $year);

        if ($by === 'week'){

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ]);

        }elseif ($by === 'month'){

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ]);

        }

        return $query
            ->select(DB::raw("count(*) AS count,  sum(total_amount) as totalAmt,
            sum(total_amount - delivery_fee) as earnings, DATE_FORMAT(created_at, '%D %M') as day"))
            ->groupBy('day')
            ->get();


    }

    public function aggregateOrdersByWeekDay(bool $totalAmount = true, $by = null, $year = null){

        $query = $this->model->query();

        if ($year) $query = $query->whereYear('created_at', $year);

        if ($by === 'week'){

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ]);

        }elseif ($by === 'month'){

            $query = $query->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ]);

        }

        return $query
            ->select(DB::raw("count(*) AS count,  sum(total_amount) as totalAmt,
            sum(total_amount - delivery_fee) as earnings, DATE_FORMAT(created_at, '%W') as weekDay"))
            ->groupBy('weekDay')
            ->get();

    }

    public function aggregateOrdersByWeekNumber(bool $totalAmount = true, $year = null){

        $query = $this->model->query();

        if ($year) $query = $query->whereYear('created_at', $year);

        return $query
            ->select(DB::raw("count(*) AS count,  sum(total_amount) as totalAmt,
            sum(total_amount - delivery_fee) as earnings, DATE_FORMAT(created_at, '%v') as weekNum"))
            ->groupBy('weekNum')
            ->get();


    }

}
