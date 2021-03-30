<template>

    <div>
        <div class="float-right mb-4">
            <a style="padding: 10px" href="/admin/orders/create" class=" pull-right btn btn-primary">
                <i class="fas fa-user-plus" style="padding-right: 10px"></i>Add New Order
            </a>
        </div>
        <br>
        <div class="box-body">

            <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tracking Num</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Sub Total</th>
                    <th>Delivery Fee</th>
                    <th>Coupon Discount</th>
                    <th>Num of Items</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="order, key in orders">
                    <td>{{ordersData.from + key}}</td>
                    <td>{{order.tracking_number}}</td>
                    <td>{{order.status}}</td>
                    <td>N{{order.total_amount | formatMoney}}</td>
                    <td>N{{order.sub_total_amount | formatMoney}}</td>
                    <td>N{{order.delivery_fee | formatMoney }}</td>
                    <td>{{order.coupon_discount}}</td>
                    <td>{{order.number_of_items}}</td>
                    <td>{{order.formatted_date}}</td>
                    <td><a :href="`/admin/orders/${order.tracking_number}`"><i class="text-center fas fa-2x fa-eye"></i></a></td>
                    <td><a @click="editOrder(order)"><i class="text-center fas fa-edit"></i></a></td>
                    <td><a @click="deleteOrder(order.id, key)"><span class="text-center fas fa-trash" ></span></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tracking Num</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Sub Total</th>
                    <th>Delivery Fee</th>
                    <th>Coupon Discount</th>
                    <th>Num of Items</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>

            </table>

        </div>

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <pagination :data="ordersData" @pagination-change-page="getOrders"></pagination>
            </nav>
        </div>

    </div>

</template>

<script>
import pagination from "laravel-vue-pagination";
import {mapActions} from "vuex";

export default {
    name: "Orders",

    components: {pagination},


    data(){

        return {

            orders: [],
            ordersData: {},
            price_range: {
                min: null,
                max: null,
            },
            loaded: false,
            order_by: '',
            sort_type: 'desc',
        }
    },

    mounted() {

        this.getOrders();

    },

    methods: {

        ...mapActions({
            getShopProducts: 'shop/getProducts'
        }),

        getOrders(page, price = false) {
            if (typeof page === 'undefined' || !page) {
                page = 1;
            }
            let query = '';
            if (!price){
                if(this.order_by && this.sort_type){
                    if(this.sort_type === 'desc'){
                        query += `&orderByDesc=${this.order_by}`
                    }else{
                        query += `&orderByAsc=${this.order_by}`
                    }
                }
            }else{
                query += `&minAmount=${this.price_range.min}&maxAmount=${this.price_range.max}`
            }

            this.$http.get(`/admin/orders/get?page=${page}${query}`)
                .then(response => {
                    this.ordersData = response.data;
                    this.orders = response.data.data;
                    this.loaded = true
                }).catch(err => {
                // console.log(err)
            });
        },


        editOrder(){


        },

        deleteOrder(){


        },
    }
}
</script>

<style scoped>

</style>
