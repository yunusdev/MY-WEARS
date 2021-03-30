<template>
    <div>
        <div class="float-right mb-4">
            <a style="padding: 10px" href="/admin/products/create" class=" pull-right btn btn-primary">
                <i class="fas fa-user-plus" style="padding-right: 10px"></i>Add New Product
            </a>
        </div>
        <br>
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
                    <td>{{product.formatted_date}}</td>
                    <td><a :href="`/admin/products/${product.slug}`"><i class="text-center fas fa-2x fa-eye"></i></a></td>
                    <td><a @click="editProduct(product)"><i class="text-center fas fa-edit"></i></a></td>
                    <td><a @click="deleteProduct(product.id, key)"><span class="text-center fas fa-trash" ></span></a></td>
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
import {mapActions} from "vuex";
import pagination from 'laravel-vue-pagination'
import Product from "../User/Shop/Product";
export default {
    name: "Products",
    props: ['raw_products'],
    components: {pagination},

    data(){

        return{

            products: [],
            productsData: {},
            price_range: {
                min: null,
                max: null,
            },
            loaded: false,
            order_by: '',
            sort_type: 'desc',

        }
    },

    async mounted(){

        await this.getProducts()
    },

    computed: {


    },

    methods: {

        ...mapActions({
            getShopProducts: 'shop/getProducts'
        }),

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
                        this.notifSuceess('Product Deleted Successfully');

                    }).catch(err => {

                        this.notifError( err.message || 'An error occurred')
                    })

                }
            })

        }
    }
}
</script>

<style scoped>

</style>
