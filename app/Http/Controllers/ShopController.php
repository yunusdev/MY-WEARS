<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\SubCategoryContract;
use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    //

    private $productRepository, $categoryRepository, $subCategoryRepository;

    public function __construct(ProductContract $productRepository, CategoryContract $categoryRepository, SubCategoryContract $subCategoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function index(){
        return view('shop.index');
    }

    public function getProducts(Request $request){

        $filters = new ProductFilter($request);
        return $this->productRepository->filterProducts($filters, 3);

    }

    public function session(){

        return json_encode(Session::get('cart'));

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
