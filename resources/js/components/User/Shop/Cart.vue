<template>
    <div class="container padding-bottom-3x mb-1">
        <div v-if="cartItems.length > 0">
            <div class="table-responsive shopping-cart">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center"><a class="btn btn-sm btn-outline-danger cursor" @click="emptyCart" href="#">Clear Cart</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in cartItems">
                        <td>
                            <div class="product-item"><a class="product-thumb" :href="'/product/' + item.product.slug"><img class="cart-item-image" :src="item.product.front_image" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a :href="'/product/' + item.product.slug">{{item.product.name}}</a></h4>
                                    <span><em class="">Size:</em> {{item.size}}</span><span><em>Color:</em> {{item.color}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium">N{{item.product_price | formatMoney}}</td>
                        <td class="text-center">
                            <div class="count-input">
                                <select @change="updateCartItemQty(item)" v-model="item.quantity" class="form-control">
                                    <option :value="index" v-for="index in 11" :key="index" >{{index}}</option>
                                </select>
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium">N{{item.amount | formatMoney}}</td>
                        <td class="text-center">
                            <a class="remove-from-cart cursor" @click="removeItem(item)" data-toggle="tooltip" title="Remove item">
                                <i class="icon-cross"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="shopping-cart-footer">
                <div class="column">
                    <form @submit.prevent="validateCoupon()" class="coupon-form">
                        <input v-model="coupon_code" class="form-control text-uppercase" type="text" placeholder="Coupon code" required>
                        <button class="btn btn-outline-primary"  type="submit">
                            Apply Coupon
                            <i class="fa fa-spinner fa-pulse" v-if="disabledCoupon"></i>
                        </button>
                        <div class="coupon" :class="!coupon_data.valid ? 'text-danger' : 'text-success'" v-if="coupon_data" >
                            {{isValidCoupon ? 'Coupon Applied successfully!' : coupon_data.message}}
                        </div>
                    </form>
                </div>
                <div class="column text-lg">
                    Subtotal: <span class="text-medium">N{{subTotalAmount | formatMoney}}</span>
                    <div class="mt-2 mb-2" v-if="validCoupon">
                    <span class="">Discount:
                        <span v-if="validCoupon.type === 'Price'" class="text-small text-danger">
                            N{{validCoupon.discount | formatMoney}} off
                        </span>
                        <span v-else class="text-small text-danger">
                            {{validCoupon.discount}}% off
                        </span>
                    </span>
                    </div>
                    <span class="" v-if="validCoupon">
                    Total Price: <span class="text-medium">N{{totalFee | formatMoney}}</span>
                </span>
                </div>

            </div>
            <div class="shopping-cart-footer">
                <div class="column"><a class="btn btn-outline-secondary" href="/shop"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
                <div class="column">
                    <a class="btn btn-success" href="/checkout">Checkout</a></div>
            </div>
        </div>

        <p class="f-17" v-else>No items in your cart. Go to the <a href="/shop">shop</a> to add items to the cart.</p>
        <h3 v-if="trendingProducts && trendingProducts.length > 0" class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
        <carousel-products :products="trendingProducts"></carousel-products>
    </div>

</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";
import store from '../../../store/index'


export default {
    name: "Cart",

    props: ['raw_trending_products'],

    data(){

        return {

            cart_items:[],
            coupon_code: null,
            coupon_data: null,
            disabledCoupon: false

        }

    },

    async mounted() {

        store.commit('cart/setCouponData', null)
        store.commit('cart/setTotalFee', null)
        // await this.getUserCartItems()
        await this.getTrendingProducts({})

    },

    computed: {
        ...mapGetters({
            cartItems: 'cart/items',
            subTotalAmount: 'cart/subTotalAmount',
            validCoupon: 'cart/validCoupon',
            couponDiscount: 'cart/couponDiscount',
            trendingProducts: 'shop/trendingProducts',
            totalQty: 'cart/totalQty'
            // totalFee: 'cart/totalFee',
        }),

        totalFee(){
            if (this.validCoupon){
                return Math.ceil(this.subTotalAmount - this.couponDiscount );
            }
            return this.subTotalAmount
        },

        getCouponDiscount(){
            if (this.isValidCoupon){
                if (this.coupon.type === 'Price'){
                    return this.coupon.discount;
                }else if (this.coupon.type === 'Percentage'){
                    return Math.round((this.coupon.discount / 100) * this.subTotalAmount);
                }else{
                    return 0;
                }
            }
            return 0;
        },
        isValidCoupon(){
            return this.coupon_data && this.coupon_data.valid && this.coupon_data.coupon
        },
        coupon(){
            return this.coupon_data.coupon
        }

    },

    methods: {

        ...mapMutations({
            setTotalFee: 'cart/setTotalFee',
            setDeliveryFee: 'cart/setDeliveryFee',
            setSubTotalAmount: 'cart/setSubTotalAmount',
            setValidCoupon: 'cart/setValidCoupon',
            setCouponDiscount: 'cart/setCouponDiscount',
        }),

        ...mapActions({
            getUserCartItems: 'cart/getUserCartItems',
            addItemsToCart: 'cart/addItemsToCart',
            removeItemFromCart: 'cart/removeItemFromCart',
            clearCart: 'cart/clearCart',
            couponValidate: 'cart/couponValidate',
            resetAllShoppingMutations: 'cart/resetAllShoppingMutations',
            getTrendingProducts: 'shop/getTrendingProducts',
        }),

        updateCartItemQty(item){

            this.addItemsToCart([item]).then((data) => {
                this.notifSuceess('Cart Updated successfully');
            }).catch((err) => {
                this.notifError( err.message || 'An error occurred')
            })

        },

        removeItem(item){
            this.removeItemFromCart(item.id).then((data) => {
                this.notifSuceess('Item Deleted successfully');
            }).catch((err) => {
                this.notifError( err.message || 'An error occurred')
            })
        },

        validateCoupon(){
            this.disabledCoupon = true
            this.couponValidate({code: this.coupon_code, total_amount: this.subTotalAmount}).then((data) => {
                this.coupon_data = data.coupon_data
                if(data.coupon_data.valid) {
                    this.setTotalFee(this.totalFee)
                    this.setValidCoupon(this.isValidCoupon)
                    this.setCouponDiscount(this.getCouponDiscount)
                }
                this.notifSuceess(data.coupon_data.message);
                this.disabledCoupon = false
            }).catch((err) => {
                if (err.response && err.response.status === 401) {
                    this.notifError('Pls make sure you signed in before adding coupon!')
                }else{
                    this.notifError( err.message || 'An error occurred')
                }
                this.disabledCoupon = false
            })
        },
        emptyCart(item){
            this.clearCart().then((data) => {
                this.resetAllShoppingMutations()
                this.notifSuceess('Cart cleared successfully');
            }).catch((err) => {
                this.notifError( err.message || 'An error occurred')
            })
        }

    }
}
</script>

<style scoped>

.coupon{

    margin-top: -5px;
    font-weight: bold;
    /*font-size: 15px;*/
}



</style>
