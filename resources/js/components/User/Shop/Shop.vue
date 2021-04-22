<template>

    <div class="container padding-bottom-3x mb-2">
        <spinner v-if="!loaded"></spinner>
        <div v-else>
            <div v-if="categories.length > 0 || products.length > 0" class="row">
                <div class="col-xl-9 col-lg-8 order-lg-2">
                    <div class="shop-toolbar padding-bottom-1x mb-2">
                        <div class="column">
                            <div class="shop-sorting">
                                <label for="sorting">Sort by:</label>
                                <select @change="getProducts()" v-model="order_by" class="form-control mb-2" id="sorting">
                                    <option value="">-- Select Sort --</option>
                                    <option value="created_at">Latest</option>
                                    <option value="views_count">Trending</option>
                                    <option value="price">Price</option>
                                </select>
                                <select @change="getProducts()" v-model="sort_type" class="form-control mb-2" id="sort_type">
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
                    <div v-if="loaded" class="row mb-5">
                        <product v-if="products.length > 0" class="mb-3" :add_col="true"
                                 v-for="product, key in products" :key="product.name" :product="product">
                        </product>
                        <p class="f-17" v-if="products.length === 0">No items match your query. Reload <a href="/shop">products</a></p>
                    </div>
                    <nav class="pagination">
                        <div class="column text-left">
                            <a class="btn btn-outline-secondary btn-sm" @click="getProducts(productsData.current_page - 1)"
                               :class="{'disabled': productsData.current_page === 1}">
                                <i class="icon-arrow-left"></i> Prev&nbsp;</a>
                        </div>
                        <div class="column text-right">
                            <a class="btn btn-outline-secondary btn-sm" :class="{'disabled': productsData.current_page === productsData.last_page}"
                               @click="getProducts(productsData.current_page + 1)">Next&nbsp;<i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </nav>
<!--                    <nav class="pagination">-->
<!--                        <pagination :data="productsData" @pagination-change-page="getProducts"></pagination>-->
<!--                    </nav>-->
<!--                    <div class="column">-->
<!--                        <ul class="pages">-->
<!--                            <li class="active"><a href="#">1</a></li>-->
<!--                            <li><a href="#">2</a></li>-->
<!--                            <li><a href="#">3</a></li>-->
<!--                            <li><a href="#">4</a></li>-->
<!--                            <li>...</li>-->
<!--                            <li><a href="#">12</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
                <div style="margin-top: 80px;" class="modal fade" id="modalShopFilters" data-backdrop="false" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Shop Filters</h4>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <shop-sidebar @filterPrice="filterPrice" :categories="categories"
                                              :category="category" :sub_category="sub_category"></shop-sidebar>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-1">
                    <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
                    <aside class="sidebar sidebar-offcanvas">

                        <shop-sidebar @filterPrice="filterPrice" :categories="categories" :category="category"
                                      :sub_category="sub_category"></shop-sidebar>
                    </aside>
                </div>
            </div>
            <p class="f-17" v-else>No items in the shop yet.</p>
        </div>

    </div>

</template>

<script>
import Product from "./Product";
import ShopSidebar from "./ShopSidebar";
import Spinner from "../Spinner";
import pagination from 'laravel-vue-pagination'
import {mapMutations, mapActions, mapGetters} from 'vuex'
export default {
    name: "Shop",

    components: {Product, pagination, Spinner, ShopSidebar},

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
            order_by: 'created_at',
            sort_type: 'desc',
            products: []
        }

    },

    async mounted() {

        await this.getProducts()
        await this.getCategories({}).then(() => {
            this.loaded = true
        })

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

        filterPrice(min, max){
            Object.assign(this.price_range, {
                min,
                max,
            })
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
