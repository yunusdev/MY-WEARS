<template>
    <div :class="{'col-md-4': add_col}">
        <div class="grid-item">
            <div class="product-card">
                <a class="product-thumb" :href="'/product/' + product.slug">
                    <img style="height: 145px" :src="product.front_image" alt="Product">
                </a>
                <h3 class="product-title"><a :href="'/product/' + product.slug">{{product.name}}</a></h3>
                <h4 class="product-price">N{{product.price | formatMoney}}</h4>
                <div class="product-buttons">
                    <wishlist :product="product"></wishlist>
                    <a class="btn btn-outline-primary btn-sm" :href="'/product/' + product.slug">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Wishlist from "./Wishlist";
export default {
    name: "Product",

    props: {

        product: {
            default: ''

        },

        add_col: {

            default: false
        },

    },

    components: {Wishlist},

    methods: {

        addOrRemoveWishlist(){



        }
    }
}
</script>

<style scoped>

</style>
