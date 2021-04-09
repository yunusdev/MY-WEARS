/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Axios from 'axios'
import Swal from 'sweetalert'
import izitoast from 'izitoast'
import '../../public/admin/css/izitoast.css'

Vue.prototype.$http = Axios;
Vue.prototype.$swal = Swal;
Vue.mixin({
    methods: {
        notifSuceess: function(msg) {
            izitoast.success({
                title: 'Success!',
                message: msg,
                position: 'topRight'
            });
        },
        notifError: function(msg) {
            izitoast.error({
                title: 'Error!',
                message: msg,
                position: 'topRight'
            });
        }
    }
});
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home', require('./components/Admin/Home.vue').default);
Vue.component('store-role', require('./components/Admin/Authorization/StoreRole.vue').default);
Vue.component('store-permission', require('./components/Admin/Authorization/StorePermission.vue').default);
Vue.component('roles', require('./components/Admin/Authorization/Roles.vue').default);
Vue.component('permissions', require('./components/Admin/Authorization/Permissions.vue').default);
Vue.component('categories', require('./components/Admin/Categories/Categories.vue').default);
Vue.component('store-category', require('./components/Admin/Categories/StoreCategory.vue').default);
Vue.component('sub-categories', require('./components/Admin/Categories/SubCategories.vue').default);
Vue.component('store-sub-category', require('./components/Admin/Categories/StoreSubCategory.vue').default);
Vue.component('sub-categories', require('./components/Admin/Categories/SubCategories.vue').default);

Vue.component('products', require('./components/Admin/Product/Products.vue').default);
Vue.component('store-product', require('./components/Admin/Product/StoreProduct.vue').default);
Vue.component('edit-product', require('./components/Admin/Product/EditProduct.vue').default);
Vue.component('view-product', require('./components/Admin/Product/ViewProduct.vue').default);

Vue.component('coupons', require('./components/Admin/Shop/Coupons.vue').default);
Vue.component('store-coupon', require('./components/Admin/Shop/StoreCoupon.vue').default);


Vue.component('orders', require('./components/Admin/Order/Orders.vue').default);
Vue.component('store-order', require('./components/Admin/Order/CreateOrder.vue').default);
Vue.component('view-order', require('./components/Admin/Order/ViewOrder.vue').default);

Vue.component('users', require('./components/Admin/Users/Users.vue').default);
Vue.component('view-user', require('./components/Admin/Users/ViewUser.vue').default);


Vue.component('nav-bar', require('./components/User/Layout/Navbar.vue').default);
Vue.component('shop', require('./components/User/Shop/Shop.vue').default);
Vue.component('product-view', require('./components/User/Shop/ProductView.vue').default);
Vue.component('carousel-products', require('./components/User/CarouselProducts.vue').default);
Vue.component('cart', require('./components/User/Shop/Cart.vue').default);
Vue.component('checkout', require('./components/User/Shop/Checkout.vue').default);
Vue.component('user-orders', require('./components/User/Account/UserOrders.vue').default);
Vue.component('view-user-order', require('./components/User/Account/ViewUserOrder.vue').default);
Vue.component('user-profile', require('./components/User/Account/UserProfile.vue').default);
Vue.component('user-address', require('./components/User/Account/UserAddress.vue').default);
Vue.component('user-wishlists', require('./components/User/Account/UserWishlist.vue').default);
Vue.component('leading-products-home', require('./components/User/Shop/LeadingProductsHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.filter('formatDate', function(value, format = 'LLLL') {
    if (value) {
        return moment(String(value)).format(format)
    }
})

Vue.filter('formatMoney', function (amount, decimalCount = 0, decimal = ".", thousands = ",") {

    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
});


Vue.filter('formatDate2', function(value, format = 'LL') {
    if (value) {
        return moment(String(value)).format(format)
    }
})

import store from './store/index'
import Vuex from 'vuex'
Vue.use(Vuex)

const app = new Vue({
    el: '#app',
    store,
});
