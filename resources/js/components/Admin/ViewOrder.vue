<template>
    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>

                <div class="text-center order-details">
                    <h6><span class="badge f-13 font-weight-600 pt-2 pb-2 pl-3 pr-3 badge-warning">{{order.status}}</span></h6>
                    <h6><span class="cont">#{{order.tracking_number}}</span></h6>
                    <h6><span class="cont">{{order.name}} | {{order.email}} | {{order.phone}}</span></h6>
                    <h6><span class="cont">{{order.address}} | {{order.lga}} | {{order.state}}</span></h6>
                </div>
                <div class="table-responsive mt-5 box-body wishlist-table margin-bottom-none">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Details</th>
                            <th>Product Price</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody v-for="item in order.order_items">
                        <tr>
                            <td>
                                <div class="product-item">
                                    <a class="product-thumb" :href="'/product/' + item.product.slug">
                                        <img :src="item.product.front_image" class="cart-item-image" :alt="item.product_name">
                                    </a>

                                </div>
                            </td>
                            <td>
                                <div class="product-info">
                                    <h4 class="product-title"><a :href="'/product/' + item.product.slug">{{item.product_name}}</a></h4>
                                    <div>Size:
                                        <div class="d-inline">{{item.size}}</div>
                                    </div>
                                    <div>Color:
                                        <div class="d-inline">{{item.color}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-medium"> <span>{{item.quantity}}</span> <span> X </span> N{{item.product_price | formatMoney}}</div>
                            </td>
                            <td>
                                <div class="text-medium">N{{item.amount | formatMoney}}</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="shopping-cart-footer">
                        <section class="widget widget-order-summary col-md-5 float-right">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Subtotal:</td>
                                    <td class="text-medium">N{{order.sub_total_amount | formatMoney}}</td>
                                </tr>
                                <tr>
                                    <td>Delivery Fee:</td>
                                    <td class="text-medium">N{{order.delivery_fee | formatMoney}}</td>
                                </tr>
                                <tr v-if="order.coupon_id">
                                    <td>Discount:</td>
                                    <td class="text-medium text-danger">- N{{order.coupon_discount | formatMoney}}</td>
                                </tr>

                                <tr>
                                    <td>Total Amount</td>
                                    <td class="text-lg">N{{order.total_amount | formatMoney}}</td>
                                </tr>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-3">
                <form @submit.prevent="updateStatus">
                    <div class="mb-3">
                        <label for="">Change Status:</label>
                        <select required v-model="status" id="" class="form-control">
                            <option value="">Select Option</option>
                            <option v-for="status in allowed_updated_statuses" :value="status">{{ status }}</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">
                        Update Status
                    </button>
                </form>
            </div>

        </div>
    </div>

</template>

<script>
import { mapActions, mapMutations, mapGetters } from 'vuex'
import Swal from "sweetalert";

export default {
    name: "ViewUserOrder",

    props: ['raw_order'],

    data(){

        return {

            order: JSON.parse(this.raw_order),
            statuses: ['Initiated', 'Processing', 'Prepared', 'Shipped', 'Delivered', 'Cancelled'],
            allowed_updated_statuses: [],
            status: ''

        }
    },

    mounted() {

       this.updateAllowedStatus()

    },

    computed: {


    },

    methods: {

        updateAllowedStatus(){

            const length = this.statuses.length
            this.allowed_updated_statuses = []
            this.status = ''
            const index = this.statuses.indexOf(this.order.status)
            if (index !== 0){

                this.allowed_updated_statuses.push(this.statuses[index - 1])

            }
            if (index + 1 < length){

                this.allowed_updated_statuses.push(this.statuses[index + 1])

            }
        },

        updateStatus(){

            Swal('Are you sure want to update the status to ' + this.status, {
                buttons: ['Oh no!', true]
            }).then(value => {
                if (value) {
                    this.$http.put(`/admin/order/${this.order.id}/update/status`, {status: this.status})
                        .then(res => {
                        this.order.status = this.status
                        this.updateAllowedStatus()
                        this.notifSuceess('Order status updated successfully!');

                    }).catch(err => {

                        this.notifError( err.message || 'An error occurred')
                    })

                }
            })

        }

    }
}
</script>

<style scoped>

img{
    height: 100px;
    width: 100px;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    /*border: 2px solid #c4cbd4;*/
}


</style>
