<?php

namespace App\Contracts;

use App\Filters\ProductFilter;
use App\Models\Product;

interface ProductContract
{

    public function getProducts();

    public function getProductsCount();

    public function getTopCategoryProducts(string $categoryId, int $num = 3);

    public function filterProducts(ProductFilter $filters, int $pagination = 9);

    public function getProductById(string $id);

    public function getRelatedProducts(Product $product, int $num = 6);

    public function getTrendingProducts(int $num = 6);

    public function getTopSellingProducts(int $num = 3);

    public function getNewArrivalsProducts(int $num = 3);

    public function incrementProductViewCount(Product $product);

    public function getProductBy(array $data, array $relationship = []);

    public function getProductsBy(array $data, array $relationship = []);

    public function getCategoryProducts(string $categoryId, array $relationship = []);

    public function getSubCategoryProducts(string $categoryId, array $relationship = []);

    public function storeProduct(array $params);

    public function updateProduct(array $params, Product $product);

    public function deleteProductImages(array $images);

    public function deleteProduct(string $id);


}
