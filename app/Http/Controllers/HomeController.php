<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    private $categoryRepository, $productRepository;

    public function __construct(CategoryContract $categoryRepository, ProductContract $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
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
        Mail::raw('Hi, welcome user!', function ($message) {
            $message->to(['yunusabdulqudus1@gmail.com', 'testinglaravel96@Gmail.com'])
    ->subject('Goooof');
});
        return view('welcome')->with($data);
    }

}
