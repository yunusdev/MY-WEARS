<template>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <spinner v-if="!loaded"></spinner>
        <div class="row" v-if="config && loaded">
            <div class="col-xl-9 col-lg-8">
                <form v-if="isCart"  @submit.prevent="initiateCheckout" >
                    <h4>Shipping Information</h4>
                    <hr class="padding-bottom-1x">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="checkout-fn">Name</label>
                                <input v-model="order.name" required class="form-control" type="text" id="checkout-fn">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="checkout-email">E-mail Address</label>
                                <input v-model="order.email" required class="form-control" type="email" id="checkout-email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="checkout-phone">Phone Number</label>
                                <input v-model="order.phone" required class="form-control" type="text" id="checkout-phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="checkout-country">Country</label>
                                <input v-if="countries.length === 1" type="text" v-model="order.country"  disabled class="form-control">
                                <select v-else v-model="order.country"  @change="setDeliveryAmount" required class="form-control" id="checkout-country">
                                    <option value="">Select country</option>
                                    <option :value="country" v-for="country in countries">{{ country }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="checkout-city">State</label>
                                <select v-if="isNigeria" v-model="state" required class="form-control" id="checkout-city">
                                    <option value="">Select State</option>
                                    <option :value="state" v-for="state in states">{{ state.name }}</option>
                                </select>
                                <input v-else v-model="order.state" required class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div v-if="isNigeria" class="form-group">
                                <label for="checkout-lg">Local Government</label>
                                <select  v-model="order.lga"  @change="setDeliveryAmount" required class="form-control" id="checkout-lg">
                                    <option value="">Select LGA</option>
                                    <option v-show="LGA.length > 0" :value="lga.name" v-for="lga in LGA">{{ lga.name }}</option>
                                </select>
                            </div>
                            <div v-else class="form-group">
                                <label for="checkout-lg">City</label>
                                <input v-model="order.lga" required class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row padding-bottom-1x">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="checkout-address1">Address</label>
                                <input v-model="order.address"  required class="form-control" type="text" id="checkout-address1">
                            </div>
                        </div>
                    </div>
                    <div class="checkout-footer">
                        <div class="column"><a class="btn btn-outline-secondary" href="/cart"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
                        <div class="column">
                            <button type="submit" class="btn btn-primary">
                                <span class="">Pay&nbsp;</span>
                                <i class="icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <p class="f-17" v-else>No items in your cart. Go to the <a href="/shop">shop</a> to add items to the cart.</p>

            </div>
            <div class="col-xl-3 col-lg-4">
                <aside class="sidebar">
                    <div class="padding-top-2x hidden-lg-up"></div>
                    <!-- Order Summary Widget-->
                    <section v-if="isCart"  class="widget widget-order-summary">
                        <h3 class="widget-title">Order Summary</h3>
                        <table class="table">
                            <tr>
                                <td>Cart Subtotal:</td>
                                <td class="text-medium">N{{subTotalAmount | formatMoney}}</td>
                            </tr>
                            <tr>
                                <td>Delivery Fee:</td>
                                <td v-if="deliveryFee" class="text-small">N{{deliveryFee | formatMoney}}</td>
                                <td v-else-if="config.delivery_free" class="text-small">Free</td>
                                <td v-else class="text-small">To be Calculated</td>
                            </tr>
                            <tr v-if="validCoupon">
                                <td>Discount:</td>
                                <td class="text-small text-danger"> - N{{couponDiscount | formatMoney}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-lg text-medium">N{{totalFee | formatMoney}}</td>
                            </tr>
                        </table>
                    </section>
                    <!-- Featured Products Widget-->
                    <product-widget :title="'TOP SELLERS'" :products="topSellingProducts"></product-widget>
                </aside>
            </div>
        </div>
        <paystack
            @payment-successful="completeOrder"
            @go-back="goBack"
            @payment-failed="paymentFailed"
            ref="paystackPayment"
            :user="order"
            id="paystack"
            :amount="totalFee"
            :paystack_pk="paystack_pk"
        />
<!--        <pay :amount="totalFee" :paystack_pk="paystack_pk" :user="order"></pay>-->
    </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";
import Paystack from "../Paystack";
import ProductWidget from "./ProductWidget";
import config from "../../../store/modules/config";
import Spinner from "../Spinner";

class Order {

    constructor(order) {

        this.name = order.name || ''
        this.email = order.email || ''
        this.phone = order.phone || ''
        this.country = order.country || 'Nigeria'
        this.state = order.state || ''
        this.lga = order.lga || ''
        this.address = order.address || ''

    }
}

export default {
    name: "Checkout",

    props: ['raw_user', 'paystack_pk'],

    components: {Paystack, Spinner, ProductWidget},

    data(){

        return {

            user: this.raw_user ? JSON.parse(this.raw_user) : null,
            order: new Order({}),
            state: '',
            lga: '',
            LGA: [],
            countries: [],
            loaded: false
        }

    },

    async mounted() {

        // await this.getCountries({})
        await this.getNigerianStates({})
        await this.setDeliveryFee(0)
        await this.setTotalFee(this.subTotalAmount - this.couponDiscount)
        await this.getConfig({})
        this.countries.unshift('Nigeria')
        this.config.foreign_countries.forEach((item) => {
            this.countries.push(item.country)
        })
        if (this.user){
            const user = this.user
            const address =  this.user && this.user.address
            Object.assign(this.order, {...user, ...address})
            if (this.user.address){
                const state = this.states.find((state) => state.name === this.user.address.state)
                this.state = state
                if (this.user.address.country === 'Nigeria') this.LGA = state.locals
                this.order.lga = this.user.address.lga
            }
        }
        this.loaded = true
        this.getTopSellingProducts({num: 4})

    },

    watch: {

        'state': function (state){
            // this.order.lga = ''
            if(state && state.name && state.locals){
                this.order.state = state.name
                this.LGA = state.locals
            }
            this.setDeliveryAmount()
        },
        'order.country': function (){
            this.order.state = ''
            this.order.lga = ''
            this.LGA = []
        }

    },

    computed: {

        ...mapGetters({
            cartItems: 'cart/items',
            subTotalAmount: 'cart/subTotalAmount',
            totalFee: 'cart/totalFee',
            validCoupon: 'cart/validCoupon',
            couponDiscount: 'cart/couponDiscount',
            deliveryFee: 'cart/deliveryFee',
            payBeforePercentage: 'cart/payBeforePercentage',
            states: 'locality/states',
            // countries: 'locality/countries',
            topSellingProducts: 'shop/topSellingProducts',
            totalQty: 'cart/totalQty',
            config: 'config/config',
        }),

        isCart(){
            return this.cartItems.length > 0
        },

        isNigeria(){

            if (!this.order.country) return true
            return this.order.country && this.order.country === 'Nigeria'
        },

        minAmountToPay(){
            return Math.round((this.payBeforePercentage / 100) * this.totalFee);
        },

        isOrderFilled(){
            if (this.order.name && this.order.email && this.order.phone && this.order.lga
                && this.order.country && this.order.state && this.order.address){
                return true
            }
            return false
        }

    },

    methods: {

        ...mapActions({
            // getCountries: 'locality/getCountries',
            couponValidate: 'cart/couponValidate',
            getNigerianStates: 'locality/getNigerianStates',
            resetAllShoppingMutations: 'cart/resetAllShoppingMutations',
            getTopSellingProducts: 'shop/getTopSellingProducts',
            getConfig: 'config/getConfig',

        }),

        ...mapMutations({
            setTotalFee: 'cart/setTotalFee',
            setDeliveryFee: 'cart/setDeliveryFee',
            setValidCoupon: 'cart/setValidCoupon',
            setCouponDiscount: 'cart/setCouponDiscount',
        }),

        async initiateCheckout(){

            if(this.validCoupon && this.validCoupon.id){
                const isValid = await this.validateCoupon()
                if (!isValid) return
            }
            this.$refs.paystackPayment.makePayment()
        },

        completeOrder(response){
            $("body").addClass("no-click");
            this.$swal({buttons: false, text: 'Pls wait while the order is been initiated..'});
            this.$http.post('/orders/create', {
                order: {
                    ...this.order,
                    ref: response.reference,
                    sub_total_amount: this.subTotalAmount,
                    total_amount: this.totalFee,
                    delivery_fee: this.deliveryFee,
                    number_of_items: this.totalQty,
                    coupon_discount: this.couponDiscount,
                    coupon_id:  this.validCoupon ? this.validCoupon.id : null,
                },
                items: this.cartItems,

            }).then(async (res) => {
                $("body").removeClass("no-click");
                await this.resetAllShoppingMutations()
                // await this.notifSuceess('Your order has been initiated successfully!');
                if (this.user){
                    window.location = '/account/orders'
                }else{
                    window.location = '/shop'
                }
            }).catch(err => {
                $("body").removeClass("no-click");
                this.$swal({text: 'An error occurred while trying to complete your order! Pls contact us if you have been charged', dangerMode: true,});
            })

        },
        paymentFailed(response){

            console.log(response)
            this.notifError(response && response.message || 'An error occurred while trying to process your payment')

        },
        goBack(){


        },

        setDeliveryAmount(){

            if (this.config.delivery_free || this.subTotalAmount >= this.config.min_amount_free_delivery ){

                this.setDeliveryFee(0)

            }else{

                if(this.order.country !== 'Nigeria'){

                    this.config.foreign_countries.forEach((item) =>{

                        if (this.order.country === item.country){

                            this.setDeliveryFee(parseInt(item.amount))
                        }

                    })

                }
                if (this.order.country === 'Nigeria' && this.order.state !== 'Lagos'){
                    this.setDeliveryFee(this.config.flat_outside_lagos_delivery_fee)
                }
                const fartherLagosLGA = this.config.farther_lagos_lg;

                if (this.order.state === 'Lagos' && fartherLagosLGA.indexOf(this.order.lga) !== -1){
                    this.setDeliveryFee(this.config.flat_farther_lagos_delivery_fee)
                }
                if (this.order.state === 'Lagos' && fartherLagosLGA.indexOf(this.order.lga) === -1){
                    this.setDeliveryFee(this.config.flat_lagos_delivery_fee)
                }
            }

            this.setTotalFee((this.subTotalAmount + this.deliveryFee) - this.couponDiscount)

        },

        async validateCoupon(){
            return this.couponValidate({
                code: this.validCoupon.code,
                total_amount: this.subTotalAmount
            }).then((data) => {
                let isValid = true
                this.coupon_data = data.coupon_data
                if (!data.coupon_data.valid) {
                    this.notifError(data.coupon_data.message);
                    this.setTotalFee(this.subTotalAmount + this.deliveryFee)
                    this.setValidCoupon(null)
                    this.setCouponDiscount(0)
                    isValid = false
                }
                return isValid;
            }).catch((err) => {
                this.notifError(err.message || 'An error occurred')
            });
        },

    }


}
</script>

<style scoped>

</style>
