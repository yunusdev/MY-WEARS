<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\SubCategoryContract;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    private $categoryRepository, $subCategoryRepository, $productRepository;

    public function __construct(CategoryContract $categoryRepository,
        SubCategoryContract $subCategoryRepository, ProductContract $productRepository
    ) {

        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->subCategoryRepository = $subCategoryRepository;

    }

    public function categoryProducts($categorySlug)
    {

        $data['category'] = $this->categoryRepository->getCategoryBy(['slug' => $categorySlug]);

        return view('shop.index')->with($data);

    }

    public function subCategoryProducts($subCategorySlug)
    {

        $data['sub_category'] = $this->subCategoryRepository->getSubCategoryBy(['slug' => $subCategorySlug], ['category']);
        return view('shop.index')->with($data);

    }

}
