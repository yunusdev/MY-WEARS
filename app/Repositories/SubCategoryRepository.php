<?php

namespace App\Repositories;

use App\Contracts\SubCategoryContract;
use App\Models\SubCategory;

class SubCategoryRepository extends BaseRepository implements SubCategoryContract
{

    public function __construct(SubCategory $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getSubCategories()
    {
        return $this->model->with('category')->latest()->get();
    }

    public function storeSubCategory(array $params)
    {
        return $this->create($params);
    }

    public function updateSubCategory(array $params, string $id)
    {
        return $this->update($params, $id);
    }

    public function deleteSubCategory(string $id)
    {
        return $this->delete($id);
    }
}
