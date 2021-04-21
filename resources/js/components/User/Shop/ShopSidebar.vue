<template>
    <div>
        <section class="widget widget-categories">
            <h3 class="widget-title">Shop Categories</h3>
            <ul>
                <li :class="{'active': category && category.slug === cat.slug}" v-for="cat in categories" :key="cat.id" class="has-children mb-3 expanded">
                    <a :href="`/category/${cat.slug}/products`">{{ cat.name }} <span>(1138)</span></a>
                    <ul>
                        <li class="mt-2" :class="{'active': sub_category && sub_category.slug === sub_cat.slug}" v-for="sub_cat in cat.sub_categories" :key="sub_cat.id">
                            <a class="" :href="`/sub-category/${sub_cat.slug}/products`">{{sub_cat.name}} <span>(508)</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <section class="widget widget-categories">
            <h3 class="widget-title">Price Range</h3>

            <vue-range-slider v-model="value" :min="min" :max="max" :formatter="formatter" :tooltip-merge="tooltipMerge" :enable-cross="enableCross"></vue-range-slider>

            <div class="row mt-3">
                <div class="col-5">
                    <button @click="filterPrice" class="btn btn-outline-primary btn-sm" type="button">Filter</button>
                </div>
                <div class="col-7 mt-3">
                        <span class="">N<span>{{value[0] | formatMoney}}</span>
                        </span>
                        &nbsp;-&nbsp;
                        <span class="">N<span>{{value[1] | formatMoney}}</span>
                        </span>
                </div>
            </div>

        </section>
    </div>
</template>

<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'
export default {
    name: "ShopSidebar",

    components: {VueRangeSlider},

    props: ['categories', 'category', 'sub_category'],

    data(){

        return {

            value: [4000, 6000],
            enableCross: false,
            tooltipMerge: false,
            min: 2000,
            max: 10000
        }

    },

    created(){
    },


    methods: {

        formatter(value){

            return `N${value}`

        },

        filterPrice(){

            this.$emit('filterPrice', this.value[0], this.value[1])

        }

    }
}
</script>

<style scoped>

</style>
