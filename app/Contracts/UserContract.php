<?php

namespace App\Contracts;

use App\Filters\UserFilter;
use App\Models\Product;

interface UserContract
{

    public function getUsers(int $numPaginated = 9, string $orderBy = 'created_at', string $sortBy = 'desc', array $relationship = []);

    public function filterUsers(UserFilter $filters, int $pagination = 10);

    public function getUser(string $id);

}
