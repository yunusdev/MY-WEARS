<template>
    <div>
        <section class="widget widget-categories">
            <h3 class="widget-title">Shop Categories</h3>
            <ul>
                <li :class="{'active': category && category.slug === cat.slug}" v-for="cat in categories" :key="cat.id" class="has-children mb-3 expanded">
                    <a :href="`/category/${cat.slug}/products`">{{ cat.name }}
                    </a>
                    <ul>
                        <li class="mt-2" :class="{'active': sub_category && sub_category.slug === sub_cat.slug}" v-for="sub_cat in cat.sub_categories" :key="sub_cat.id">
                            <a class="" :href="`/sub-category/${sub_cat.slug}/products`">{{sub_cat.name}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <section v-if="productPriceRange && range.length === 2 && !modal" class="widget widget-categories">
            <h3 class="widget-title">Price Range</h3>

<!--            <price-range-slider-->
<!--                :trackHeight="0.5"-->
<!--                :min="productPriceRange.min"-->
<!--                :max="productPriceRange.max"-->
<!--                :minValue="productPriceRange.rangeMin"-->
<!--                :maxValue="productPriceRange.rangeMax"-->
<!--            />-->
<!--            <VueSimpleRangeSlider-->
<!--                :min="productPriceRange.min"-->
<!--                :max="productPriceRange.max"-->
<!--                v-model="range"-->
<!--            />-->
<!--            <div class="row mt-3">-->
<!--                <div class="col-5">-->
<!--                    <button @click="filterPrice" class="btn btn-outline-primary btn-sm" type="button">Filter</button>-->
<!--                </div>-->
<!--                <div class="col-7 mt-3">-->
<!--                        <span class="">N<span>{{range[0] | formatMoney}}</span>-->
<!--                        </span>-->
<!--                        &nbsp;-&nbsp;-->
<!--                        <span class="">N<span>{{range[1] | formatMoney}}</span>-->
<!--                        </span>-->
<!--                </div>-->
<!--            </div>-->

        </section>
    </div>
</template>

<script>
import VueSimpleRangeSlider from 'vue-simple-range-slider';
import 'vue-simple-range-slider/dist/vueSimpleRangeSlider.css'
import {mapGetters} from 'vuex'
export default {
    name: "ShopSidebar",

    components: {VueSimpleRangeSlider},

    props: ['categories', 'category', 'sub_category', 'modal'],

    data(){

        return {

            range: [],
        }

    },

    mounted(){
        // this.range.push(this.productPriceRange.rangeMin)
        // this.range.push(this.productPriceRange.rangeMax)
        this.range.push(15000)
        this.range.push(20000)

    },

    computed: {

        ...mapGetters({

            productPriceRange: 'shop/productPriceRange'

        }),
    },

    methods: {


        formatter(value){

            return `N${value}`

        },

        filterPrice(){

            // this.$emit('filterPrice', this.range[0], this.range[1])
            this.$emit('filterPrice', this.range[0], this.range[1])

        }

    }
}
</script>

<style scoped>

</style>
