<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Contracts\UserContract;
use App\Filters\OrderFilter;
use App\Filters\UserFilter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //
    private $userRepository, $orderRepository;

    public function __construct(UserContract $userRepository, OrderContract $orderRepository)
    {

        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;

    }

    public function index(){

        return view('admin.users.index');

    }

    public function getAllUsers(){

        return $this->userRepository->getUsers();

    }

    public function getUsers(Request $request){

        if (!(isset($request['orderByAsc']) && isset($request['orderByDesc']))) $request['orderByDesc'] = 'created_at';

        $filters = new UserFilter($request);

        return $this->userRepository->filterUsers($filters, 10);

    }

    public function getUserOrders(Request $request,User $user){

        $data['title'] = 'User Orders - (' . $user->name . ')';
        $data['user'] = $user;
        return view('admin.orders.index')->with($data);

    }

    public function delete($id){

        User::findOrFail($id)->delete();

        return back()->with('message_delete', 'The User has been deleted Successfully');

    }

}
