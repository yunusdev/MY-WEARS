<template>
    <div class="payment">
    </div>
</template>

<script>
import Vue from 'vue'

export default Vue.extend({
    name: 'FlutterWave',
    props: ['amount', 'user', 'flutterwave_pk'],
    methods: {
        makePayment() {
            const that = this
            /* eslint-disable no-undef */
            FlutterwaveCheckout({
                public_key: this.flutterwave_pk,
                tx_ref: 'REF-' + Date.now(),
                amount: this.amount,
                currency: "NGN",
                country: "NG",
                // redirect_url: // specified redirect URL
                //     "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
                // meta: {
                //     consumer_id: 23,
                // },
                customer: {
                    email: this.user ? this.user.email : '',
                    phone_number: this.user ? this.user.phone : '',
                    name: this.user ? this.user.name : '',
                },
                callback: function (response) {
                    console.log('error >>>>>>>>>>>>>>>>');
                    console.log(response);
                    // if (response.status === 'success') {
                    //     that.$emit('payment-successful', response)
                    // } else {
                    //     that.$emit('payment-failed', response)
                    // }
                },
                onclose: function() {
                    // close modal
                    that.$emit('go-back', null)
                },
                customizations: {
                    title: "MY Wears",
                    description: "Payment for items in cart",
                    logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        },
        pressed(value) {
            this.selectedPackageIndex = value
        }
    }
})
</script>

<style scoped>
</style>
