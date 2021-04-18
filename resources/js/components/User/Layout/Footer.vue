<template>
    <footer v-if="config" class="site-footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 padding-bottom-1x">
                    <!-- Contact Info-->
                    <section class="widget widget-light-skin">
                        <h3 class="widget-title">Get In Touch With Us</h3>
                        <p class="text-white">Phone: {{ config.contact_phone }}</p>
                        <ul class="list-unstyled text-sm text-white">
                            <li><span class="opacity-50">Monday-Friday:</span> 9.00 am - 8.00 pm</li>
                            <li><span class="opacity-50">Saturday:</span> 10.00 am - 6.00 pm</li>
                        </ul>
                        <p class="text-white">{{ config.contact_email }}</p>
                        <a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                    </section>
                </div>
                <div class="col-lg-4 padding-bottom-1x">
                    <section class="widget widget-links-1 widget-links  widget-light-skin">
                        <h3 class="widget-title">Links</h3>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/cart">Cart</a></li>
                            <li><a href="/track/order">Track Order</a></li>
                            <li v-if="user"><a href="/account/orders">Orders</a></li>
                            <li v-if="!user"><a href="/login">Login</a></li>
                            <li v-if="!user"><a href="/register">Register</a></li>
                        </ul>
                    </section>
                </div>
                <div class="col-lg-4 padding-bottom-1x">
                    <!-- Contact Info-->
                    <section class="widget widget-light-skin">
                        <h3 class="widget-title">Get In Touch With Us</h3>
                        <p class="text-white">Phone: 00 33 169 7720</p>
                        <ul class="list-unstyled text-sm text-white">
                            <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                            <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                        </ul>
                        <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                    </section>
                </div>

            </div>
                <!-- Copyright-->
                <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by yunusdev</a></p>
            </div>
    </footer>

</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "Footer",

    props: ['raw_user'],

    data(){

        return {

            user: this.raw_user ? JSON.parse(this.raw_user) : null,

        }

    },

    computed: {

        ...mapGetters({
            config: 'config/config',
        }),
    }

}
</script>

<style scoped>

</style>
