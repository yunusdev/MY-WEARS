<template>
    <div>

        <div class="row">
            <div class="col-lg-8">
                <OrderWeekDaysChart/>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <h4>Top Selling Products</h4>
                        <div class="card-header-action dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="false">Month</a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <li class="dropdown-title">Select Period</li>
                                <li><a href="#" class="dropdown-item">Today</a></li>
                                <li><a href="#" class="dropdown-item">Week</a></li>
                                <li><a href="#" class="dropdown-item active">Month</a></li>
                                <li><a href="#" class="dropdown-item">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll" tabindex="2" style="height: 315px; overflow: hidden; outline: none;">
                        <ul class="list-unstyled list-unstyled-border">
                            <li v-for="top in top_products" class="media">
                                <img class="mr-3 rounded" height="55" width="55" :src="top.product.front_image" alt="product">
                                <div class="media-body">
                                    <div class="float-right"><div class="font-weight-600 text-muted text-small">{{top.totalQty}} Sales</div></div>
                                    <a :href="`/admin/products/${top.product.slug}`">
                                        <div class="media-title">{{top.product.name}}</div>
                                    </a>
                                    <div class="mt-1">
                                        <div class="budget-price">
<!--                                            <div class="budget-price-square bg-danger" data-width="64%" style="width: 64%;"></div>-->
                                            <div class="budget-price-label">N{{top.totalAmount | formatMoney}}</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer pt-3 d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>
        <OrderMonthlyChart/>
    </div>
</template>

<script>
import OrderWeekDaysChart from "./Chart/OrderWeekDaysChart";
import OrderMonthlyChart from "./Chart/OrderMonthlyChart";

export default {
    name: "Home",
    props: ['raw_top_products'],
    components: {OrderWeekDaysChart,OrderMonthlyChart},
    data(){
        return {
            top_products:  JSON.parse(this.raw_top_products)
        };

    }
}
</script>

<style scoped>

</style>
