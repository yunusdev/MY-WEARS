<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\ConfigContract;
use App\Contracts\ProductContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    private $categoryRepository, $productRepository, $configRepository;

    public function __construct(CategoryContract $categoryRepository, ProductContract $productRepository,
                                ConfigContract $configRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->configRepository = $configRepository;
        $this->productRepository = $productRepository;
        $this->middleware('auth')->except('index');
    }

    public function index()
    {

        $categories = $this->categoryRepository->getTopCategories();
        foreach ($categories as $category){

            $category['top_products'] = $this->productRepository->getTopCategoryProducts($category->id);
        }
        $data['top_categories'] = $categories;
        $data['config'] = $this->configRepository->getConfig();;
        return view('welcome')->with($data);
    }

}
