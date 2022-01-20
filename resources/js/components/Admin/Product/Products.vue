<template>
    <div>
        <span
        style="font-size: 15px"
        class="badge badge-primary px-3 py-2 text-white font-weight-bold float"
        >{{productsData.total}}</span
        >
        <div class="mb-4">
            <a style="padding: 10px" href="/admin/products/create" class=" pull-right btn btn-primary">
                <i class="fas fa-user-plus" style="padding-right: 10px"></i>Add New Product
            </a>
            <button style="padding: 10px" @click="toggleFilter" class=" pull-right mr-3 btn btn-warning">
                Toggle Filter
            </button>
        </div>
        <br>
        <hr>
        <div v-if="show_filter" class="row">
            <div class="col-md-3 form-group">
                <label for="">Created At (From):</label>
                <input v-model="search.createdFrom" class="form-control" type="date">
            </div>
            <div class=" col-md-3 form-group">
                <label for="">Created At (To):</label>
                <input v-model="search.createdTo" class="form-control" type="date">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Class:</label>
                <select v-model="search.class" class="form-control">
                    <option value="">Select Option</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Children</option>
                    <option>Unisex</option>
                    <option>Not Applicable</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Select Category:</label>
                <multiselect
                    v-model="category"
                    :options="allCategories"
                    :searchable="true"
                    track-by="id"
                    label="name"
                    placeholder="Select Category"
                ></multiselect>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Select Sub Category:</label>
                <multiselect
                    v-model="subCategory"
                    :options="allSubcategories"
                    :searchable="true"
                    track-by="id"
                    label="name"
                    placeholder="Select Sub Category"
                ></multiselect>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Name:</label>
                <input v-model="search.name" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Min Price:</label>
                <input v-model="search.minPrice" class="form-control" type="number">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Max Price:</label>
                <input v-model="search.maxPrice" class="form-control" type="number">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Available:</label>
                <select v-model="search.available" class="form-control">
                    <option value="">Select Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Available Colors:</label>
                <input v-model="search.availableColors" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Available Sizes:</label>
                <input v-model="search.availableSizes" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Sort By:</label>
                <select v-model="order_by" class="form-control" id="sorting">
                    <option value="">-- Select Sort --</option>
                    <option value="created_at">Latest</option>
                    <option value="price">Price</option>
                    <option value="views_count">View Count</option>
<!--                    <option value="order_items_count">order_items_count</option>-->
                </select>
            </div>
            <div v-if="order_by" class="col-md-3 col-xs-12 form-group">
                <label for="">Sort Type:</label>
                <select v-model="sort_type" class="form-control" id="sort_type">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
            <div class="col-md-3 form-group col-sm-12">
                <label for="">Actions:</label>
                <div class="">
                    <button
                        :disabled="disabled"
                        @click="getProducts()"
                        type="button"
                        class="btn mr-2 pt-2 pb-2 pr-3 btn-primary"
                    >
                        <span class="pr-2">Refresh</span>
                        <i v-show="disabled" class="fas fa-spinner fa-pulse"></i>
                    </button>
                    <button
                        :disabled="disabled"
                        @click="clear"
                        type="button"
                        class="btn pt-2 pb-2 pl-3 pr-3 btn-danger"
                    >
                        <span class="pr-2">Clear</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Class</th>
                    <th>Available</th>
                    <th>Order Count</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product, key in products">
                    <td>{{productsData.from + key}}</td>
                    <td>{{product.name}}</td>
                    <td>{{product.code}}</td>
                    <td>N{{product.price | formatMoney}}</td>
                    <td>{{product.category.name}}</td>
                    <td>{{product.sub_category.name}}</td>
                    <td>{{product.class}}</td>
                    <td>{{product.available ? 'Available' : 'Not Available'}}</td>
                    <td>{{product.order_items_count}}</td>
                    <td>{{product.formatted_date}}</td>
                    <td><a :href="`/admin/products/${product.slug}`"><i class="text-center fas fa-2x fa-eye"></i></a></td>
                    <td><a :href="`/admin/products/${product.slug}/edit`"><i class="text-center fas fa-edit"></i></a></td>
                    <td><a :class="{'disabled' : product.order_items_count > 0}" @click="deleteProduct(product.id, key)"><span class="text-center fas fa-trash" ></span></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Class</th>
                    <th>Available</th>
                    <th>Order Count</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>

            </table>

        </div>

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <pagination :data="productsData" @pagination-change-page="getProducts"></pagination>
            </nav>
        </div>

    </div>

</template>

<script>

import Swal from 'sweetalert'
import {mapActions, mapGetters} from "vuex";
import pagination from 'laravel-vue-pagination'
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
const searchQuery = {
    createdFrom: '',
    createdTo: '',
    minPrice: '',
    maxPrice: '',
    category: '',
    subCategory: '',
    name: '',
    class: '',
    available: '',
    availableColors: '',
    availableSizes: '',
    orderByDesc: '',
    orderByAsc: '',
}
export default {
    name: "Products",
    props: ['raw_category', 'raw_sub_category'],
    components: {pagination, Multiselect},

    data(){

        return{

            products: [],
            productsData: {},
            loaded: false,
            disabled: false,
            show_filter: true,
            order_by: 'created_at',
            category: '',
            subCategory: '',
            sort_type: 'desc',
            search: {...searchQuery},
        }
    },

    mounted(){

        if (this.raw_category) this.category = JSON.parse(this.raw_category)
        if (this.raw_sub_category) this.subCategory = JSON.parse(this.raw_sub_category)

        this.getAllCategories({})
        this.getAllSubcategories({})
        this.getProducts()
    },

    computed: {

        ...mapGetters({
            allCategories: 'categories_admin/allCategories',
            allSubcategories: 'categories_admin/allSubcategories',
        })
    },

    methods: {
        toggleFilter(){

            this.show_filter = !this.show_filter

        },

        ...mapActions({
            serialize: 'shop/serialize',
            getShopProducts: 'shop/getProducts',
            getAllCategories: 'categories_admin/getAllCategories',
            getAllSubcategories: 'categories_admin/getAllSubcategories'
        }),

        async getProducts(page, price = false){
            this.disabled = true
            if (typeof page === 'undefined' || !page) {
                page = 1;
            }
            if(this.order_by && this.sort_type){
                if(this.sort_type === 'desc'){
                    this.search.orderByDesc = this.order_by
                    this.search.orderByAsc = ''
                }else{
                    this.search.orderByAsc = this.order_by
                    this.search.orderByDesc = ''
                }
            }
            if (this.category && this.category.id){
                this.search.category = this.category.id
            }else {
                this.search.category = ''
            }
            if (this.subCategory && this.subCategory.id){
                this.search.subCategory = this.subCategory.id
            }else {
                this.search.subCategory = ''
            }

            let query = await this.serialize(this.search);
            this.$http.get(`/admin/products/get?page=${page}&${query}`)
                .then(response => {
                    this.productsData = response.data;
                    this.products = response.data.data;
                    this.loaded = true
                    this.disabled = false
                }).catch(err => {
                this.disabled = false
            });

        },

        clear(){
            Object.assign(this.search, {...searchQuery})
            this.getProducts()
        },

        editProduct(product){

            window.location = ''

        },

        deleteProduct(id, key){

            Swal('Are you sure want to delete this product', {
                buttons: ['Oh no!', true]
            }).then(value => {
                if (value) {
                    this.$http.delete(`/admin/products/${id}`).then(res => {

                        this.products.splice(key, 1);
                        this.productsData.total -= 1
                        this.notifSuceess('Product Deleted Successfully');

                    }).catch(err => {

                        this.notifError( err.message || 'An error occurred')
                    })

                }
            })

        },


    }
}
</script>

<style scoped>

</style>
