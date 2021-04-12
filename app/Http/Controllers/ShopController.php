<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Contracts\SubCategoryContract;
use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    //

    private $productRepository, $categoryRepository, $subCategoryRepository, $orderRepository;

    public function __construct(ProductContract $productRepository, CategoryContract $categoryRepository,
                                SubCategoryContract $subCategoryRepository, OrderContract $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->subCategoryRepository = $subCategoryRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        return view('shop.index');
    }

    public function getProducts(Request $request){

        if (!(isset($request['orderByAsc']) && isset($request['orderByDesc']))) $request['orderByDesc'] = 'created_at';

        $filters = new ProductFilter($request);
        return $this->productRepository->filterProducts($filters, 3);

    }

    public function trackOrder($tracking_number = ""){

        $data['tracking_number'] = $tracking_number;
        $data['order'] = $this->orderRepository->getOrderByTrackingNumber($tracking_number, [], false);
        return view('shop.track-order')->with($data);

    }

    public function searchTrackOrder($tracking_number){

        return $this->orderRepository->getOrderByTrackingNumber($tracking_number, [], false);

    }

    public function viewProduct($slug){

        $data['product'] = $this->productRepository->getProductBy(['slug' => $slug], ['productImages', 'category', 'subCategory']);
//        $this->productRepository->incrementProductViewCount($data['product']);
        $data['related_products'] = $this->productRepository->getRelatedProducts($data['product']);
        return view('shop.product-view')->with($data);

    }

    public function getCategories(){

        return $this->categoryRepository->getCategoriesSubCategories();
    }

    public function trendingProducts(){

        return $this->productRepository->getTrendingProducts();

    }

    public function topSellingProducts($num = 3){

        return $this->productRepository->getTopSellingProducts(intval($num));

    }

    public function newArrivalsProducts(){

        return $this->productRepository->getNewArrivalsProducts();

    }
}
