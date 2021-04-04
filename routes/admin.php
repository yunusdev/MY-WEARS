<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/login',
    [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm']
)->name('admin.login');

Route::post(
    '/login',
    [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']
);

Route::group(['middleware'=>'auth:admin'], function() {

    Route::get(
        '/logout',
        [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout']
    )->name('admin.logout');

    Route::get(
        '/users/get',
        [\App\Http\Controllers\Admin\UsersController::class, 'getUsers']
    );

    Route::get(
        '/users/all',
        [\App\Http\Controllers\Admin\UsersController::class, 'getAllUsers']
    );

    Route::resource(
        '/users',
        \App\Http\Controllers\Admin\UsersController::class
    );

    Route::get(
        '/users/{user}/orders',
        [\App\Http\Controllers\Admin\UsersController::class, 'getUserOrders']
    );

    Route::delete(
        '/users/delete/{id}',
        [\App\Http\Controllers\Admin\UsersController::class, 'delete']
    )->name('users.destroy');

    Route::get(
        '/home',
        [\App\Http\Controllers\Admin\HomeController::class, 'index']
    )->name('admin.home');

    Route::resource(
        '/admins',
        \App\Http\Controllers\Admin\AdminUsersController::class,
    );

    Route::resource(
        '/permission',
        \App\Http\Controllers\Admin\PermissionController::class,
    );

    Route::resource(
        '/role',
        \App\Http\Controllers\Admin\RoleController::class,
    );

    Route::get(
        '/categories/all',
        [\App\Http\Controllers\Admin\CategoriesController::class, 'getAllCategories']
    );

    Route::resource(
        '/categories',
        \App\Http\Controllers\Admin\CategoriesController::class,
    );

    Route::get(
        '/categories/{category}/products',
        [\App\Http\Controllers\Admin\CategoriesController::class, 'getProducts']
    )->name('categories.products');

    Route::get(
        '/sub-categories/all',
        [\App\Http\Controllers\Admin\SubCategoriesController::class, 'getAllSubCategories']
    );

    Route::get(
        '/sub-categories',
        [\App\Http\Controllers\Admin\SubCategoriesController::class, 'getAll']
    )->name('sub-categories.getAll');

    Route::get(
        '/sub-categories/{subCategory}/products',
        [\App\Http\Controllers\Admin\SubCategoriesController::class, 'getProducts']
    )->name('sub-categories.products');

    Route::resource(
        '/{category}/sub-categories',
        \App\Http\Controllers\Admin\SubCategoriesController::class,
    );

    Route::get(
        '/products/all',
        [\App\Http\Controllers\Admin\ProductsController::class, 'getAllProducts']
    );

    Route::get(
        '/products/get',
        [\App\Http\Controllers\Admin\ProductsController::class, 'getProducts']
    );

    Route::resource(
        '/products',
        \App\Http\Controllers\Admin\ProductsController::class,
    );
    Route::get(
        '/orders/get',
        [\App\Http\Controllers\Admin\OrdersController::class, 'getOrders']
    );

    Route::get(
        '/orders/statuses',
        [\App\Http\Controllers\Admin\OrdersController::class, 'getOrderStatus']
    );

    Route::put(
        '/order/{order}/update/status',
        [\App\Http\Controllers\Admin\OrdersController::class, 'updateStatus']
    );

    Route::resource(
        '/orders',
        \App\Http\Controllers\Admin\OrdersController::class,
    );

    Route::get(
        '/coupons/all',
        [\App\Http\Controllers\Admin\CouponsController::class, 'getAllCoupons']
    );

    Route::get(
        '/coupons/{coupon}/orders',
        [\App\Http\Controllers\Admin\CouponsController::class, 'getCouponOrders']
    );

    Route::resource(
        '/coupons',
        \App\Http\Controllers\Admin\CouponsController::class,
    );

});
