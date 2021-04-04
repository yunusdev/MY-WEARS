<template>

    <div class="">

        <form-wizard color ="#232B35" @on-complete="onComplete" stepSize = "md" title="Create Order" subtitle=" ">

            <tab-content title="Items" :before-change="validateFirstStep">

                <table class="table table-stripped">

                    <tr style="margin-bottom: 50px !important; " class="mb-20 mt-20" v-for="item, key in items">
                        <td colspan="1">
                            <a class="remove-from-cart mt-2 text-danger cursor" @click="removeItem(key)" data-toggle="tooltip" title="Remove item">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <label>Select Product</label>
                            <multiselect
                                v-model="item.product"
                                :options="allProducts"
                                :searchable="true"
                                @input="onSelectProduct(key)"
                                track-by="id"
                                label="name"
                                placeholder="Select Product"
                            ></multiselect>
                        </td>
                        <td>
                            <label >Select Size</label>
                            <select v-if="item.product" required  v-model="item.size" class="form-control mb-2 form-control-sm form-control-rounded">
                                <option value="">Select Size</option>
                                <option v-for="size in item.product.sizes">{{ size }}</option>
                            </select>
                        </td>

                        <td>
                            <label >Select Color</label>
                            <select v-if="item.product" required  v-model="item.color" class="form-control mb-2 form-control-sm form-control-rounded">
                                <option value="">Select Color</option>
                                <option v-for="size in item.product.colors">{{ size }}</option>
                            </select>
                        </td>
                        <td>
                            <label>Select Quantity</label>
                            <select @change="setItemAmount(key)" v-if="item.product" required v-model="item.quantity"  class="form-control mb-2 form-control-sm form-control-rounded">
                                <option value="">Select Quantity</option>
                                <option  v-for="index in 11" :key="index" >{{index}}</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div class=" text-center">
                    <button style="" class="mt-2 mb-3 btn btn-outline-primary" @click="addMore()">
                        <i class="fas fa-plus"></i> Add More</button>
                </div>

            </tab-content>

            <tab-content title="Confirm Items" :before-change="validateSecondStep">

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
                        <tbody v-for="item in this.items">
                        <tr v-if="item.product">
                            <td>
                                <div class="product-item">
                                    <a class="product-thumb" target="_blank" :href="'/product/' + item.product.slug">
                                        <img :src="item.product.front_image" class="cart-item-image" :alt="item.product_name">
                                    </a>

                                </div>
                            </td>
                            <td>
                                <div class="mt-3 mb-3">
                                    <h5 class="product-title">
                                        <a target="_blank" :href="'/product/' + item.product.slug">{{item.product_name}}</a>
                                    </h5>
                                    <div>Code:
                                        <div class="d-inline">{{item.product.code}}</div>
                                    </div>
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
                    <section class="widget widget-order-summary col-md-5 float-right">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Cart Subtotal:</td>
                                <td class="text-medium">N{{subTotalAmount | formatMoney}}</td>
                            </tr>
                            <tr>
                                <td>Delivery Fee:</td>
                                <input v-model="order.delivery_fee" type="number" class="form-control">
                            </tr>
                            <tr>
                                <td>Total Fee</td>
                                <td class="text-lg text-medium">N{{totalFee | formatMoney}}</td>
                            </tr>
                        </table>
                    </section>
                </div>


            </tab-content>

            <tab-content title="User Details" :before-change="validateLastStep">

                <div class="row">

                    <div class="col-md-6">
                        <label for="">User:</label>
                        <multiselect
                            v-model="user"
                            :options="allUsers"
                            :searchable="true"
                            track-by="id"
                            label="name"
                            placeholder="Select User"
                        ></multiselect>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <input v-model="order.name" :class="{'is-invalid': errors.hasError('order.name')}" required class="form-control" type="text">
                        <div class="invalid-feedback" v-if="errors.hasError('order.name')">{{ errors.first('order.name') }}</div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail Address</label>
                        <input v-model="order.email" :class="{'is-invalid': errors.hasError('order.email')}" class="form-control" type="email">
                        <div class="invalid-feedback" v-if="errors.hasError('order.email')">{{ errors.first('order.email') }}</div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Phone Number</label>
                        <input v-model="order.phone" :class="{'is-invalid': errors.hasError('order.phone')}" class="form-control" type="text">
                        <div class="invalid-feedback" v-if="errors.hasError('order.phone')">{{ errors.first('order.phone') }}</div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select :class="{'is-invalid': errors.hasError('order.country')}" v-model="order.country" required class="form-control">
                            <option value="">Select country</option>
                            <option :value="country.name" v-for="country in countries">{{ country.name }}</option>
                        </select>
                        <div class="invalid-feedback" v-if="errors.hasError('order.country')">{{ errors.first('order.country') }}</div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="checkout-city">State</label>
                        <select :class="{'is-invalid': errors.hasError('order.state')}" v-if="isNigeria" v-model="state" required class="form-control" id="checkout-city">
                            <option value="">Select State</option>
                            <option :value="state" v-for="state in states">{{ state.name }}</option>
                        </select>
                        <input v-else :class="{'is-invalid': errors.hasError('order.state')}" v-model="order.state" required class="form-control" type="text">
                        <div class="invalid-feedback" v-if="errors.hasError('order.state')">{{ errors.first('order.state') }}</div>

                    </div>
                    <div class="col-md-6 form-group">
                        <div v-if="isNigeria" class="">
                            <label>Local Government</label>
                            <select :class="{'is-invalid': errors.hasError('order.lga')}" v-model="order.lga" required class="form-control">
                                <option value="">Select LGA</option>
                                <option v-show="LGA.length > 0" :value="lga.name" v-for="lga in LGA">{{ lga.name }}</option>
                            </select>
                        </div>
                        <div v-else>
                            <label>City</label>
                            <input :class="{'is-invalid': errors.hasError('order.lga')}" v-model="order.lga" required class="form-control" type="text">
                        </div>
                        <div class="invalid-feedback" v-if="errors.hasError('order.lga')">{{ errors.first('order.lga') }}</div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input :class="{'is-invalid': errors.hasError('order.address')}" v-model="order.address"  required class="form-control" type="text" >
                        <div class="invalid-feedback" v-if="errors.hasError('order.address')">{{ errors.first('order.address') }}</div>
                    </div>
                </div>

            </tab-content>

        </form-wizard>



    </div>

</template>

<script>
import {mapGetters, mapActions} from "vuex";
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VueFormWizard from 'vue-form-wizard'
import Vue from 'vue'
import ErrorBag from "../../error_bag";
Vue.use(VueFormWizard)
class Order {

    constructor(order) {

        this.user_id = order.user_id || ''
        this.name = order.name || ''
        this.email = order.email || ''
        this.phone = order.phone || '2349021333232'
        this.country = order.country || 'Nigeria'
        this.state = order.state || ''
        this.lga = order.lga || ''
        this.delivery_fee = order.delivery_fee || 800
        this.address = order.address || 'Bajlulaiye'

    }
}
export default {
    name: "CreateOrder",

    data(){

        return {

            items: [],
            item: {
                product_id: '',
                product_name: '',
                product: '',
                product_price: '',
                size: '',
                color: '',
                quantity: '',
                amount: '',

            },
            order: new Order({}),
            errors: new ErrorBag,
            state: '',
            user: '',
            lga: '',
            LGA: [],
        }

    },

    mounted() {

        this.getAllProducts({})
        this.items.push({...this.item})

    },

    components: {Multiselect},

    computed: {

        ...mapGetters({
            allUsers: 'users/allUsers',
            allProducts: 'products_admin/allProducts',
            states: 'locality/states',
            countries: 'locality/countries',
        }),

        subTotalAmount(){
            return this.items.reduce((sum, item) => sum + parseInt(item.amount), 0);
        },

        totalQty(){
            return this.items.reduce((sum, item) => sum + parseInt(item.quantity), 0);
        },

        totalFee(){

            if(!this.order.delivery_fee) return this.subTotalAmount;
            return  parseInt(this.subTotalAmount) + parseInt(this.order.delivery_fee)
        }
    },
    watch: {

        user: function (){

            Object.assign(this.order, {
                user_id: '',
                email: '',
                name: '',
                phone: '',
            })
            if (this.user){

                Object.assign(this.order, {
                    user_id: this.user.id,
                    email: this.user.email,
                    name: this.user.name,
                    phone: this.user.phone,
                })

            }

        },
        'state': function (state){
            // this.order.lga = ''
            if(state.name && state.locals){
                this.order.state = state.name
                this.LGA = state.locals
            }
        },
        'order.country': function (){
            this.order.state = ''
            this.order.lga = ''
            this.LGA = []
        }

    },

    methods: {

        ...mapActions({

            getAllProducts: 'products_admin/getAllProducts',
            getAllUsers: 'users/getAllUsers',

        }),

        addMore(){
            this.items.push({...this.item})
        },
        removeItem(index){
            this.items.splice(index, 1)
        },
        isNigeria(){
            if (!this.order.country) return true
            return this.order.country && this.order.country === 'Nigeria'
        },
        emptyItem(index) {
            Object.assign(this.items[index], {
                product_id: '',
                product_name: '',
                product_price: '',
                color: '',
                size: '',
                quantity: '',
            })
        },
        setItemAmount(index){
            if(this.items[index].quantity){
                this.items[index].amount = this.items[index].product_price * this.items[index].quantity
            }
        },
        onSelectProduct(index){
            this.emptyItem(index)
            if(this.items[index].product){
                Object.assign(this.items[index], {
                    product_id: this.items[index].product.id,
                    product_name: this.items[index].product.name,
                    product_price: this.items[index].product.price,
                })
            }else{
                this.emptyItem(index)
            }
        },
        onComplete(){

            this.errors.clearAll()
            this.$http.post('/admin/orders', {
                order: {
                    ...this.order,
                    sub_total_amount: this.subTotalAmount,
                    total_amount: this.totalFee,
                    number_of_items: this.totalQty,
                },
                items: this.items,

            }).then(async (res) => {
                await this.notifSuceess('The order has been initiated successfully!');
                window.location = '/admin/orders'

            }).catch(err => {
                this.notifError(err.message || 'An error occurred');
                if (err.response && err.response.status === 422) {
                    const errors = err.response.data.errors;
                    this.errors.setErrors(errors);
                }
                console.log(err)
            })

        },

        validateFirstStep(){

            this.items = this.items.filter((item) => item.product)

            let success = true

            for (let i = 0; i < this.items.length; i++) {
                const item = this.items[i];
                if (!item.product || !item.size || !item.color || !item.quantity){
                    this.notifError('Pls make sure all the fields are filled')
                    success =  false;
                    break;
                }
            }

            if (!success) return success

            let msg = ''

            for (let i = 0; i < this.items.length; i++) {
                const item1 = this.items[i];
                for (let j = 0; j < this.items.length; j++) {
                    const item2 = this.items[j];
                    if (i !== j){
                        if ((item1.product_id === item2.product_id)
                            && (item1.size === item2.size)
                            && (item1.color === item2.color)
                        ){
                            msg = `The item (${item1.product_name}) is duplicated with same size and color`
                            success =  false;
                            break;
                        }
                    }

                }
            }

            if(msg) this.notifError(msg)
            return success;

        },

        validateSecondStep(){

            if (this.order.delivery_fee && this.order.delivery_fee > 500) return true;

            this.notifError('Pls enter a valid delivery fee greater than N500')
            return false;

        },

        validateLastStep(){

            return true;

        }

    }

}
</script>

<style scoped>
@media screen and (max-width: 376px){

    div#here .vue-form-wizard .wizard-card-footer div#.wizard-footer-right button{

        margin-top: 10px
    }

}

.wizard-icon-container{

    background-color: black !important;

}

img{
    height: 100px;
    width: 100px;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    /*border: 2px solid #c4cbd4;*/
}
.invalid-feedback{
    display: block !important;
}

</style>
