<template>

    <div>
        <span
            style="font-size: 15px"
            class="badge badge-primary px-3 py-2 text-white font-weight-bold float"
        >{{usersData.total}}</span
        >
        <div class="float-right mb-4">
            <button style="padding: 10px" @click="toggleFilter" class=" pull-right mr-3 btn btn-secondary">
                Toggle Filter
            </button>
        </div>
        <br>
        <div v-if="show_filter" class="row container">
            <div class="col-md-3 form-group">
                <label for="">Created At (From):</label>
                <input v-model="search.createdFrom" class="form-control" type="date">
            </div>
            <div class=" col-md-3 form-group">
                <label for="">Created At (To):</label>
                <input v-model="search.createdTo" class="form-control" type="date">
            </div>

            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Name:</label>
                <input v-model="search.name" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Email:</label>
                <input v-model="search.email" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Phone:</label>
                <input v-model="search.phone" class="form-control" type="text">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Sort By:</label>
                <select v-model="order_by" class="form-control" id="sorting">
                    <option value="">-- Select Sort --</option>
                    <option value="created_at">Latest</option>
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
                        @click="getUsers()"
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

            <table id="example1"  class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders Count</th>
                    <th>Date Created</th>
                    <th>View</th>
                    <th>View Orders</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <tr @click="viewUser(user.id)" class="cursor cursor_hover" v-for="user, key in users">
                    <td>{{usersData.from + key}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.phone}}</td>
                    <td>{{user.orders_count}}</td>
                    <td>{{user.formatted_date}}</td>
                    <td><a :href="`/admin/users/${user.id}`"><i class="text-center fas fa-2x fa-eye"></i></a></td>
                    <td><a :href="`/admin/users/${user.id}/orders`"><i class="text-center fas fa-2x fa-list"></i></a></td>
                    <td><a @click="editUser(user)"><i class="text-center fas fa-edit"></i></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders Count</th>
                    <th>Date Created</th>
                    <th>View</th>
                    <th>View Orders</th>
                    <th>Edit</th>
                </tr>
                </tfoot>

            </table>

        </div>

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <pagination :data="usersData" @pagination-change-page="getUsers"></pagination>
            </nav>
        </div>

    </div>

</template>

<script>
import pagination from "laravel-vue-pagination";
import {mapActions} from "vuex";
const searchQuery = {
    createdFrom: '',
    createdTo: '',
    name: '',
    email: '',
    phone: '',
}

export default {
    name: "Users",

    components: {pagination},


    data(){

        return {

            users: [],
            usersData: {},
            disabled: false,
            show_filter: true,
            order_by: 'created_at',
            loaded: false,
            user_by: '',
            sort_type: 'desc',
            search: {...searchQuery},
        }
    },

    mounted() {

        this.getUsers();

    },

    methods: {

        ...mapActions({
            serialize: 'shop/serialize',
        }),

        viewUser(userId){

            window.location = `/admin/users/${userId}`

        },

        async getUsers(page, price = false) {
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
            let query = await this.serialize(this.search);
            this.$http.get(`/admin/users/get?page=${page}&${query}`)
                .then(response => {
                    this.usersData = response.data;
                    this.users = response.data.data;
                    this.loaded = true
                }).catch(err => {
                // console.log(err)
            });
        },

        clear(){
            Object.assign(this.search, {...searchQuery})
            this.getUsers()
        },

        toggleFilter(){

        },
        editUser(){


        },

        deleteUser(){


        },
    }
}
</script>

<style scoped>

</style>
