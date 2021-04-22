<template>

    <div>
        <span
            style="font-size: 15px"
            class="badge badge-primary px-3 py-2 text-white font-weight-bold float"
        >{{ordersData.total}}</span
        >
        <div class="mb-4">

            <a style="padding: 10px" href="/admin/orders/create" class=" pull-right btn btn-primary">
                <i class="fas fa-user-plus" style="padding-right: 10px"></i>Add New Order
            </a>
            <button style="padding: 10px" @click="toggleFilter" class="pull-right  mr-3 btn btn-warning">
                Toggle Filter
            </button>
        </div>
        <br>
        <hr>
        <div v-if="show_filter" class="row">
            <div class="col-md-3 form-group">
                <label for="">Created At (From):</label>
                <input v-model="search.createdFrom" class="form-control" type="date">
            </div>
            <div class=" col-md-3 form-group">
                <label for="">Created At (To):</label>
                <input v-model="search.createdTo" class="form-control" type="date">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Registered User:</label>
                <select v-model="search.isRegisteredUser" class="form-control">
                    <option value="">Select Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div v-if="search.isRegisteredUser === 'Yes'" class="col-md-3 col-xs-12 form-group">
                <label for="">Select User:</label>
                <multiselect
                    v-model="user"
                    :options="allUsers"
                    :searchable="true"
                    track-by="id"
                    label="name"
                    placeholder="Select User"
                ></multiselect>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Status:</label>
                <select v-model="search.status" class="form-control">
                    <option value="">Select Status</option>
                    <option v-for="status in statuses" :value="status">{{ status }}</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Tracking Num:</label>
                <input v-model="search.trackingNumber" class="form-control text-uppercase" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Min Amount:</label>
                <input v-model="search.minAmount" class="form-control" type="number">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Max Amount:</label>
                <input v-model="search.maxAmount" class="form-control" type="number">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Coupon Discount:</label>
                <select v-model="search.isCoupon" class="form-control">
                    <option value="">Select Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div v-if="search.isCoupon === 'Yes'" class="col-md-3 col-xs-12 form-group">
                <label for="">Select User:</label>
                <multiselect
                    v-model="coupon"
                    :options="allCoupons"
                    :searchable="true"
                    track-by="id"
                    label="code"
                    placeholder="Select Coupon"
                ></multiselect>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Name or Email:</label>
                <input v-model="search.userInfo" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Location (Country, State, LG):</label>
                <input v-model="search.location" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Sort By:</label>
                <select v-model="order_by" class="form-control" id="sorting">
                    <option value="">-- Select Sort --</option>
                    <option value="created_at">Latest</option>
                    <option value="number_of_items">Num of Items</option>
                    <option value="total_amount">Total Amount</option>
                </select>
            </div>
            <div v-if="order_by" class="col-md-3 col-xs-12 form-group">
                <label for="">Sort Type:</label>
                <select v-model="sort_type" class="form-control" id="sort_type">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
            <div class="col-md-3 form-group col-sm-12">
                <label for="">Actions:</label>
                <div class="">
                    <button
                        :disabled="disabled"
                        @click="getOrders()"
                        type="button"
                        class="btn mr-2 pt-2 pb-2 pr-3 btn-primary"
                    >
                        <span class="pr-2">Refresh</span>
                        <i v-show="disabled" class="fas fa-spinner fa-pulse"></i>
                    </button>
                    <button
                        :disabled="disabled"
                        @click="clear"
                        type="button"
                        class="btn pt-2 pb-2 pl-3 pr-3 btn-danger"
                    >
                        <span class="pr-2">Clear</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="box-body">

            <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tracking Num</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Sub Total</th>
                    <th>Delivery Fee</th>
                    <th>Coupon Discount</th>
                    <th>Num of Items</th>
                    <th>Date</th>
                    <th>View</th>
<!--                    <th>Edit</th>-->
<!--                    <th>Delete</th>-->
                </tr>
                </thead>
                <tbody>
                <tr v-for="order, key in orders">
                    <td>{{ordersData.from + key}}</td>
                    <td>{{order.name}}</td>
                    <td>{{order.tracking_number}}</td>
                    <td>
                        <span :class="`badge${getStatusColor(order.status)}`" class="badge">{{order.status}}</span>
                    </td>
                    <td>N{{order.total_amount | formatMoney}}</td>
                    <td>N{{order.sub_total_amount | formatMoney}}</td>
                    <td>N{{order.delivery_fee | formatMoney }}</td>
                    <td> <span v-if="order.coupon_id">N{{order.coupon_discount | formatMoney}}</span>
                        <span v-else>--</span>
                    </td>

                    <td>{{order.number_of_items}}</td>
                    <td>{{order.formatted_date}}</td>
                    <td><a target="_blank" :href="`/admin/orders/${order.tracking_number}`"><i class="text-center fas fa-2x fa-eye"></i></a></td>
<!--                    <td><a @click="editOrder(order)"><i class="text-center fas fa-edit"></i></a></td>-->
<!--                    <td><a @click="deleteOrder(order.id, key)"><span class="text-center fas fa-trash" ></span></a></td>-->
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tracking Num</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Sub Total</th>
                    <th>Delivery Fee</th>
                    <th>Coupon Discount</th>
                    <th>Num of Items</th>
                    <th>Date</th>
                    <th>View</th>
<!--                    <th>Edit</th>-->
<!--                    <th>Delete</th>-->
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
import {mapActions, mapGetters} from "vuex";
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
const {getOrderStatusColor} = require('../../order_status');

const searchQuery = {
    createdFrom: '',
    createdTo: '',
    status: '',
    trackingNumber: '',
    minAmount: '',
    maxAmount: '',
    isCoupon: '',
    coupon: '',
    isRegisteredUser: '',
    user: '',
    userInfo: '',
    location: '',
    orderByDesc: '',
    orderByAsc: '',
}

export default {
    name: "Orders",

    props: ['raw_user', 'raw_coupon'],

    components: {pagination, Multiselect},


    data(){

        return {

            orders: [],
            show_filter: true,
            ordersData: {},
            loaded: false,
            order_by: 'created_at',
            sort_type: 'desc',
            disabled: false,
            search: {...searchQuery},
            users: [],
            user: '',
            coupon: '',

        }
    },

    mounted() {

        if (this.raw_user) {
            this.search.isRegisteredUser = 'Yes'
            this.user = JSON.parse(this.raw_user)
        }
        if (this.raw_coupon) {
            this.search.isCoupon = 'Yes'
            this.coupon = JSON.parse(this.raw_coupon)
        }
        this.getAllUsers({})
        this.getAllOrderStatus({});
        this.getAllCoupons({})
        this.getOrders();

    },

    computed: {

        ...mapGetters({
            allUsers: 'users/allUsers',
            allCoupons: 'coupons_admin/allCoupons',
            statuses: 'orders_admin/allOrderStatus',
        }),
    },

    methods: {
        getStatusColor(status){
            return  getOrderStatusColor(status)
        },
        toggleFilter(){

            this.show_filter = !this.show_filter

        },
        ...mapActions({
            serialize: 'shop/serialize',
            getAllUsers: 'users/getAllUsers',
            getAllCoupons: 'coupons_admin/getAllCoupons',
            getAllOrderStatus: 'orders_admin/getAllStatus',
        }),

        async getOrders(page, price = false) {
            this.disabled = true
            if (typeof page === 'undefined' || !page) {
                page = 1;
            }
            if(this.order_by && this.sort_type){
                if(this.sort_type === 'desc'){
                    this.search.orderByDesc = this.order_by
                    this.search.orderByAsc = ''
                }else{
                    this.search.orderByAsc = this.order_by
                    this.search.orderByDesc = ''
                }
            }
            if (this.user && this.user.id){
                this.search.user = this.user.id
            }else {
                this.search.user = ''
            }
            if (this.coupon && this.coupon.id){
                this.search.coupon = this.coupon.id
            }else {
                this.search.coupon = ''
            }
            let query = await this.serialize(this.search);

            this.$http.get(`/admin/orders/get?page=${page}&${query}`)
                .then(response => {
                    this.ordersData = response.data;
                    this.orders = response.data.data;
                    this.loaded = true
                    this.disabled = false
                }).catch(err => {
                this.disabled = false
            });
        },
        clear(){
            Object.assign(this.search, {...searchQuery})
            this.getOrders()
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
