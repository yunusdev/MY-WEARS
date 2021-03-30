<template>

    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <!-- Products-->
            <div class="col-xl-9 col-lg-8 order-lg-2">
                <!-- Shop Toolbar-->
                <div class="shop-toolbar padding-bottom-1x mb-2">
                    <div class="column">
                        <div class="shop-sorting">
                            <label for="sorting">Sort by:</label>
                            <select @change="getProducts()" v-model="order_by" class="form-control" id="sorting">
                                <option value="">-- Select Sort --</option>
                                <option value="created_at">Latest</option>
                                <option value="views_count">Trending</option>
                                <option value="price">Price</option>
                            </select>
                            <select @change="getProducts()" v-model="sort_type" class="form-control" id="sort_type">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                            <span class="text-muted">Showing:&nbsp;</span>
                            <span>
                                {{productsData.from}} -  {{productsData.to}} items
                            </span>
                        </div>
                    </div>
                    <div class="column">
<!--                            <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>-->
                    </div>
                </div>
                <!-- Products Grid-->
                <div class="row mb-5">
<!--                    <div class="gutter-sizer"></div>-->
<!--                    <div class="grid-sizer"></div>-->
                    <product :add_col="true" v-if="loaded" v-for="product, key in products" :key="product.name" :product="product"></product>
                </div>

                <!-- Pagination-->
<!--                <pagination :data="productsData" @pagination-change-page="getProducts"></pagination>-->
                <nav class="pagination">
                    <div class="column text-left hidden-xs-down">
                        <a class="btn btn-outline-secondary btn-sm" @click="getProducts(productsData.current_page - 1)"
                           :class="{'disabled': productsData.current_page === 1}">
                            <i class="icon-arrow-left"></i> Prev&nbsp;</a>
                    </div>
                    <div class="column">
                        <ul class="pages">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">12</a></li>
                        </ul>
                    </div>
                    <div class="column text-right hidden-xs-down">
                        <a class="btn btn-outline-secondary btn-sm" :class="{'disabled': productsData.current_page === productsData.last_page}"
                           @click="getProducts(productsData.current_page + 1)">Next&nbsp;<i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </nav>
            </div>
            <!-- Sidebar          -->
            <div class="col-xl-3 col-lg-4 order-lg-1">
                <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
                <aside class="sidebar sidebar-offcanvas">
                    <!-- Widget Categories-->
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
                    <!-- Widget Price Range-->
                    <section class="widget widget-categories">
                        <h3 class="widget-title">Price Range</h3>
                        <form class="price-range-slider" method="post" data-start-min="500" data-start-max="1000" data-min="500" data-max="20000" data-step="1">
                            <div class="ui-range-slider"></div>
                            <footer class="ui-range-slider-footer">
                                <div class="column">
                                    <button @click="filterPrice" class="btn btn-outline-primary btn-sm" type="button">Filter</button>
                                </div>
                                <div class="column">
                                    <div class="ui-range-values">
                                        <div class="ui-range-value-min">N<span></span>
                                            <input id="min" type="hidden">
                                        </div>&nbsp;-&nbsp;
                                        <div class="ui-range-value-max">N<span></span>
                                            <input id="max" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                    <!-- Promo Banner-->
                    <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
                        <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                        <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                            <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                            <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>

</template>

<script>
import Product from "./Product";
import pagination from 'laravel-vue-pagination'
import {mapMutations, mapActions, mapGetters} from 'vuex'
export default {
    name: "Shop",

    components: {Product, pagination},

    props: ['raw_sub_category', 'raw_category'],

    data(){

        return {
            category: this.raw_category ? JSON.parse(this.raw_category): null,
            sub_category: this.raw_sub_category ? JSON.parse(this.raw_sub_category) : null,
            productsData: {},
            price_range: {
              min: null,
              max: null,
            },
            loaded: false,
            order_by: '',
            sort_type: 'desc',
            products: []
        }

    },

    async mounted() {

        await this.getProducts()
        await this.getCategories({})

    },

    computed: {

        ...mapGetters({

            categories: 'shop/categories'

        })

    },

    methods: {

        ...mapActions({
            // getUserCartItems: 'cart/getUserCartItems',
            getCategories: 'shop/getCategories',
            getShopProducts: 'shop/getProducts'

        }),

        filterPrice(){

            this.price_range.min = $("#min").val() || 500
            this.price_range.max = $("#max").val() || 1000

            this.getProducts(null, true)

        },

        getProducts(page, price = false){

            this.getShopProducts({
                page: page, price, category: this.category, sub_category: this.sub_category,
                order_by: this.order_by, sort_type: this.sort_type, price_range: this.price_range
            }).then((data) => {
                this.productsData = data;
                this.products = data.data;
                this.loaded = true
            })

        },


    }

}
</script>

<style scoped>

</style>
