<template>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <nav-account :user="user" :raw_url="raw_url"></nav-account>

            <spinner v-if="!loaded"></spinner>

            <div v-else class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>


                <div v-if="userOrders && userOrders.data.length > 0"  class="table-responsive">
                    <table class="table table-hover margin-bottom-none">
                        <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Date Purchased</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr @click="viewOrder(order)" class="cursor" v-for="order in userOrders.data">
                                <td><a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{order.tracking_number}}</a></td>
                                <td><span class="text-medium">N{{order.total_amount | formatMoney}}</span></td>
                                <td><span :class="`text${getStatusColor(order.status)}`" class="font-weight-bold">{{ order.status }}</span></td>
                                <td>{{order.formatted_date}}</td>

                            </tr>
                        </tbody>
                    </table>

                    <nav class="pagination">
                        <div class="column text-left ">
                            <a class="btn btn-outline-secondary btn-sm" @click="getOrders(userOrders.current_page - 1)"
                               :class="{'disabled': userOrders.current_page === 1}">
                                <i class="icon-arrow-left"></i> Prev&nbsp;</a>
                        </div>
                        <div class="column text-right ">
                            <a class="btn btn-outline-secondary btn-sm" :class="{'disabled': userOrders.current_page === userOrders.last_page}"
                               @click="getOrders(userOrders.current_page + 1)">Next&nbsp;<i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </nav>

                </div>
                <p v-else>No orders yet.</p>

            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapMutations, mapGetters } from 'vuex'
import Spinner from "../Spinner";
import NavAccount from "./NavAccount";
const {getOrderStatusColor} = require('../../order_status');
export default {
    name: "UserOrders",

    props: ['raw_url', 'raw_user'],

    components: {NavAccount, Spinner},

    data(){

        return {

            user: JSON.parse(this.raw_user),
            loaded: false,

        }

    },

    async mounted(){

        await this.getOrders().then(() => {
            this.loaded = true
        })

    },

    computed: {

        ...mapGetters({
            userOrders: 'account/userOrders'
        }),



    },

    methods: {

        ...mapMutations({

            setOrder: 'account/setOrder'

        }),

        ...mapActions({

            getUserOrders: 'account/getUserOrders',
            // getOrderStatusColor: 'shop/getOrderStatusColor'

        }),
        getStatusColor(status){
            return  getOrderStatusColor(status)
        },


        getOrders(page){

            this.getUserOrders({page}).then((data) => {
                this.loaded = true
            })

        },
        viewOrder(order){

            this.setOrder(order)
            window.location = '/account/orders/' + order.tracking_number

        }

    }
}
</script>

<style scoped>

</style>
