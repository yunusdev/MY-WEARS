<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Utils\RandomStringGenerator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{

    protected $productRepository, $categoryRepository;

    public function __construct(ProductContract $productRepository, CategoryContract $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

    }

    public function index(){

        $data['title'] = 'Products';
        return view('admin.products.index')->with($data);

    }

    public function getAllProducts(){

        return $this->productRepository->getProducts();

    }

    public function getProducts(Request $request){

        $filters = new ProductFilter($request);
        return $this->productRepository->filterProducts($filters, 5);

    }

    public function create(){

        $data['categories'] = $this->categoryRepository->getCategories();
        return view('admin.products.create')->with($data);

    }

    public function store(ProductStoreRequest  $request){

        try {

            $params = $request->only(
                'name', 'class', 'category_id',
                'images', 'quantity', 'weight', 'front_image', 'available',
                'sub_category_id', 'price', 'available_colors',
                'available_sizes', 'description', 'featured', 'verified'
            );

            $params['available_colors'] = implode(',', $params['available_colors']);
            $params['available_sizes'] = implode(',', $params['available_sizes']);

            return $this->productRepository->storeProduct($params);


        } catch (\Throwable $exception) {

            throw $exception;
        }


    }

    public function show($slug){

        $data['product'] = $this->productRepository->getProductBy(['slug' => $slug], ['category', 'subCategory', 'productImages']);
        return view('admin.products.show')->with($data);

    }

    public function edit($slug){

        $data['product'] = $this->productRepository->getProductBy(['slug' => $slug], ['category', 'subCategory', 'productImages']);
        $data['categories'] = $this->categoryRepository->getCategories();
        return view('admin.products.edit')->with($data);

    }

    public function update(ProductUpdateRequest  $request, Product $product){

        $params = $request->only(
            'name', 'class', 'category_id',
            'images', 'quantity', 'weight', 'front_image', 'available',
            'sub_category_id', 'price', 'available_colors',
            'available_sizes', 'description', 'featured', 'verified'
        );

        $params['available_colors'] = implode(',', $params['available_colors']);
        $params['available_sizes'] = implode(',', $params['available_sizes']);

        return $this->productRepository->updateProduct($params, $product);

    }

    public function deleteImages(Request $request){

        try {

            $this->validate($request, [

                'images' => 'required'

            ]);

            $this->productRepository->deleteProductImages($request['images']);

            return response()->json([

                'message' => 'Images deleted successfully'

            ]);


        }catch (\Throwable $throwable){

            throw $throwable;
        }

    }

    public function destroy(Product $product){

        $this->productRepository->deleteProduct($product->id);

        return response()->json([

            'message' => 'Product deleted successfully'

        ]);
    }
}
