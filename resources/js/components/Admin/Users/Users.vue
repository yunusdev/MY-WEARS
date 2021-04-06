<template>

    <div>
        <br>
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

export default {
    name: "Users",

    components: {pagination},


    data(){

        return {

            users: [],
            usersData: {},
            price_range: {
                min: null,
                max: null,
            },
            loaded: false,
            user_by: '',
            sort_type: 'desc',
        }
    },

    mounted() {

        this.getUsers();

    },

    methods: {

        viewUser(userId){

            window.location = `/admin/users/${userId}`

        },

        getUsers(page, price = false) {
            if (typeof page === 'undefined' || !page) {
                page = 1;
            }
            let query = '';
            if (!price){
                if(this.user_by && this.sort_type){
                    if(this.sort_type === 'desc'){
                        query += `&userByDesc=${this.user_by}`
                    }else{
                        query += `&userByAsc=${this.user_by}`
                    }
                }
            }else{
                query += `&minAmount=${this.price_range.min}&maxAmount=${this.price_range.max}`
            }

            this.$http.get(`/admin/users/get?page=${page}${query}`)
                .then(response => {
                    this.usersData = response.data;
                    this.users = response.data.data;
                    this.loaded = true
                }).catch(err => {
                // console.log(err)
            });
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
