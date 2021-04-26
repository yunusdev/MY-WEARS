<template>
    <div class="container padding-bottom-3x mb-2">
        <spinner v-if="!loaded"></spinner>
        <div v-else class="row">
            <nav-account :raw_url="raw_url" :user="user"></nav-account>
            <div class="col-lg-8">
                <h4 class="mt-3">Delivery Address</h4>
                <hr class="mb-4">
                <form v-if="userAddress" @submit.prevent="updateAddress" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="checkout-country">Country</label>
                            <select  v-model="userAddress.country" required class="form-control" id="checkout-country">
                                <option value="">Select country</option>
                                <option :value="country" v-for="country in countries">{{ country }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="checkout-city">State</label>
                            <select  v-if="isNigeria" v-model="state" required class="form-control" id="checkout-city">
                                <option value="">Select State</option>
                                <option :value="state" v-for="state in states">{{ state.name }}</option>
                            </select>
                            <input v-else v-model="userAddress.state" required class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div v-if="isNigeria" class="form-group">
                            <label for="checkout-lg">Local Government</label>
                            <select  v-model="userAddress.lga" required class="form-control" id="checkout-lg">
                                <option value="">Select LGA</option>
                                <option :value="lga.name" v-for="lga in LGA">{{ lga.name }}</option>
                            </select>
                        </div>
                        <div v-else class="form-group">
                            <label for="checkout-lg">City</label>
                            <input v-model="userAddress.lga" required class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="checkout-address1">Address</label>
                            <input v-model="userAddress.address"  required class="form-control" type="text" id="checkout-address1">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox d-block">
                            </div>
                            <button class="btn btn-primary margin-right-none" type="submit">
                                Update Address
                                <i class="fa fa-spinner fa-pulse" v-if="disabled"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import NavAccount from "./NavAccount";
import ErrorBag from "../../error_bag";
import {mapActions, mapGetters} from "vuex";
import Spinner from "../Spinner";

class Address{

    constructor(address) {

        this.country = address.country || 'Nigeria'
        this.state = address.state || ''
        this.lga = address.lga || ''
        this.address = address.address || ''

    }

}
export default {
    name: "UserAddress",

    props: ['raw_user', 'raw_url'],

    components: {NavAccount, Spinner},

    data(){

        return {

            user: JSON.parse(this.raw_user),
            userAddress: null,
            errors: new ErrorBag,
            state: '',
            lga: '',
            LGA: [],
            countries: [],
            disabled: false,
            loaded: false,

        }

    },

    async mounted() {
        await this.getConfig({})
        this.countries.unshift('Nigeria')
        this.config.foreign_countries.forEach((item) => {
            this.countries.push(item.country)
        })
        await this.getNigerianStates({})
        this.userAddress = new Address({})
        if (this.user.address){
            this.userAddress = new Address(this.user.address)
            const state = this.states.find((state) => state.name === this.user.address.state)
            this.state = state
            if (this.userAddress.country === 'Nigeria') this.LGA = state.locals
            this.userAddress.lga = this.user.address.lga
        }
        this.loaded = true

    },

    computed: {

        ...mapGetters({
            states: 'locality/states',
            config: 'config/config',

        }),

        isNigeria(){

            if (this.userAddress){
                if (!this.userAddress.country) return true
                return this.userAddress.country && this.userAddress.country === 'Nigeria'
            }
            return true;

        },

    },

    watch: {
        'userAddress.country': function (){
            // this.state = null
            this.userAddress.state = ''
            this.LGA = []
            // if(this.LGA.length === 0){
            //     this.userAddress.lga = ''
            // }

        },
        'state': function (state){
            if(state && state.name && state.locals){
                this.userAddress.state = state.name
                this.LGA = state.locals
            }
            // this.userAddress.lga = ''

        },
    },

    methods: {
        ...mapActions({
            getNigerianStates: 'locality/getNigerianStates',
            getConfig: 'config/getConfig',
        }),

        updateAddress(){
            this.disabled = true
            this.$http.put('/account/address', this.userAddress).then(async (res) => {
                this.notifSuceess('Address updated successfully')
                this.disabled = false

            }).catch(err => {
                if (err.response && err.response.status === 422) {
                    const errors = err.response.data.errors;
                    this.errors.setErrors(errors);
                }
                this.notifError( err.message || 'An error occurred')
                this.disabled = false

            })

        },
    }

}
</script>

<style scoped>

</style>
