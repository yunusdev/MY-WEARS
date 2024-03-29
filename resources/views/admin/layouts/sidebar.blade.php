<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
{{--            <a class="" style="" href="{{route('admin.home')}}">MY WEARS</a>--}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MY</a>
        </div>
        @php
            function isActiveUrl($url){
                $current_url = url()->current();
                $base_url = env('APP_URL');
                return $base_url . $url === $current_url ? 'active' : '';
            }
        @endphp
        <ul class="sidebar-menu">
            <li class="{{isActiveUrl('/admin/home')}}"><a class="nav-link" href="{{route('admin.home')}}"><i class="fas fa-home"></i> <span>Home</span></a></li>

            <li class="menu-header">Dashboard</li>
            <li class="{{isActiveUrl('/admin/admins')}}"><a class="nav-link" href="{{route('admins.index')}}"><i class="fas fa-users"></i> <span>Admins</span></a></li>
            <li class="{{isActiveUrl('/admin/admins/create')}}"><a class="nav-link" href="{{route('admins.create')}}"><i class="fas fa-user-plus"></i> <span>Add Admin</span></a></li>

            <li class="menu-header">Starter</li>
            <li class="{{isActiveUrl('/admin/users')}}"><a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-user"></i> <span>Users</span></a></li>


            <li class="{{isActiveUrl('/admin/categories')}}"><a class="nav-link" href="{{route('categories.index')}}"><i class="fas fa-list"></i> <span>Categories</span></a></li>
            <li class="{{isActiveUrl('/admin/sub-categories')}}"><a class="nav-link" href="{{route('sub-categories.getAll',)}}"><i class="fas fa-list"></i> <span>Sub Categories</span></a></li>
            <li class="{{isActiveUrl('/admin/products')}}"><a class="nav-link" href="{{route('products.index')}}"><i class="fas fa-star"></i> <span>Products</span></a></li>
            <li class="{{isActiveUrl('/admin/orders')}}"><a class="nav-link" href="{{route('orders.index')}}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
            <li class="{{isActiveUrl('/admin/orders/statistics')}}"><a class="nav-link" href="{{route('orders.statistics')}}"><i class="fas fa-shopping-cart"></i> <span>Orders Statistics</span></a></li>
            <li class="{{isActiveUrl('/admin/coupons')}}"><a class="nav-link" href="{{route('coupons.index')}}"><i class="fas fa-gift"></i> <span>Coupons</span></a></li>


{{--            <li class="menu-header">AUTHORIZING</li>--}}
{{--            <li class="{{isActiveUrl('/admin/config')}}"><a class="nav-link" href="{{route('config.index')}}"><i class="fas fa-cogs"></i> <span>Config</span></a></li>--}}
{{--            <li class="{{isActiveUrl('/admin/role')}}"><a class="nav-link" href="{{route('role.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Roles</span></a></li>--}}
{{--            <li class="{{isActiveUrl('/admin/permission')}}"><a class="nav-link" href="{{route('permission.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Permissions</span></a></li>--}}

        </ul>

        <hr>
        <div class="mt-1 mb-4 p-3 hide-sidebar-mini">
            <a href="{{route('config.index')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-cogs"></i> Configurations
            </a>
        </div>
    </aside>
</div>
