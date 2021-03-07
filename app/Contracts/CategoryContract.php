<?php

namespace App\Contracts;

interface CategoryContract
{

    public function getCategories();

    public function storeCategory(array $params);

    public function updateCategory(array $params, string $id);
//
    public function deleteCategory(string $id);

}