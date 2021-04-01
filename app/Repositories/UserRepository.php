<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Filters\UserFilter;
use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{
    //
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getUsers(int $numPaginated = 9, string $orderBy = 'created_at', string $sortBy = 'desc', array $relationship = [])
    {
        return $this->all();

    }

    public function filterUsers(UserFilter $filters, int $pagination = 10)
    {
        return $this->filter($filters, $pagination, []);
    }

    public function getUser(string $id)
    {
        // TODO: Implement getUser() method.
    }


}
