<template>
    <div class="container padding-bottom-3x  mb-1">
        <div class="justify-content-center">
            <form @submit.prevent="trackOrder" class="col-sm-12 col-md-6 "  style="margin: 0 auto 15px auto !important;">
                <div class="input-group">
                    <input type="text" placeholder="Tracking Number" v-model="search_track_num" required class="form-control text-uppercase">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search!</button>
                    </span>
                </div>
            </form>
        </div>
        <div v-if="order && tracking_number">
            <div class="card mb-3">
                <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">{{order.tracking_number}}</span></div>
                <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
<!--                    <div class="w-100 text-center py-1 px-2"><span class='text-medium'>Shipped Via:</span> UPS Ground</div>-->
                    <div class="w-100 text-center py-1 px-2"><span class='text-medium'>Status:</span> {{getStatusText(order.status)}} <span :class="'text'+getStatusColor(order.status)">({{order.status}})</span></div>
                    <div class="w-100 text-center py-1 px-2">
                        <span class='text-medium'>Initiated Date:</span> {{ order.formatted_date}}</div>
                </div>
                <div class="card-body">
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                        <div v-for="status, key in statuses" class="step" :class="{'completed': currentStatusIndex >= key}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i :class="getTrackIcon(status)"></i></div>
                            </div>
                            <h4 class="step-title">{{getStatusText(status)}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
                <div class="custom-control custom-checkbox mr-3">
                </div>
                <div class="text-left text-sm-right" v-if="order.user_id">
                    <a class="btn btn-outline-primary btn-rounded btn-sm" :href="'/account/orders/' + order.tracking_number">View Order Details</a>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
const {getOrderStatusText, getOrderStatusTrackIcon, getOrderStatusColor} = require('../../order_status');

export default {
    name: "TrackingOrder",

    props: ['raw_order', 'tracking_number'],

    data(){

        return {

            order: this.raw_order ? JSON.parse(this.raw_order) : null,
            statuses: ['Initiated', 'Processing', 'Prepared', 'Shipped', 'Delivered'],
            search_track_num: this.tracking_number ? this.tracking_number : ''

        }

    },

    computed: {

      currentStatusIndex(){

          if (!this.order) return -1

          return this.statuses.findIndex((status) => status === this.order.status)

      }

    },

    methods: {
        getStatusText(status){

            return getOrderStatusText(status)
        },
        getStatusColor(status){
            return  getOrderStatusColor(status)
        },
        getTrackIcon(status){

            return getOrderStatusTrackIcon(status)
        },
        trackOrder(){

            this.$http.get(`/search/track/order/${this.search_track_num}`).then(res => {
                if (res.data){
                    this.notifSuceess('Order fetched successfully')
                    this.order = res.data
                    this.tracking_number = this.search_track_num
                }else{
                    this.notifError( 'Invalid Tracking number')
                }

            }).catch(err => {

                this.notifError( err.message || 'An error occurred')
            })


        }

    }
}
</script>

<style scoped>
.form-control{
    background-color: #f1f1f3 !important;
    border-radius: 4px !important;
}
.form-control:focus{
    background-color: #F7F7FA !important;
}
</style>
