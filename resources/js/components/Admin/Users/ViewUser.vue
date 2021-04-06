<template>

    <div>
        <div class="row">
            <div class="col-md-6 mb-3">
            </div>
            <div class="col-md-6 mb-3">
                <a style="padding: 10px" :href="`/admin/users/${user.id}/orders`" class="pull-right btn btn-primary">
                    <i class="fas fa-list text-white"  style="padding-right: 10px"></i>User Orders
                </a>
            </div>

            <div class="col-md-6">
                <label>Name:</label>
                <h6>{{user.name}}</h6>
            </div>
            <div class="col-md-6">
                <label>Email:</label>
                <h6>{{user.email}}</h6>
            </div>
            <div class="col-md-6">
                <label>Phone:</label>
                <h6>{{user.phone}}</h6>
            </div>
            <div class="col-md-6">
                <label>Provider:</label>
                <h6 class="text-capitalize">{{user.provider || '--'}}</h6>
            </div>
                <div v-if="user.address" class="col-md-6">
                    <label>Address:</label>
                    <h6>{{user.address.address || '--'}}</h6>
                </div>
                <div v-if="user.address" class="col-md-6">
                    <label>LGA:</label>
                    <h6>{{user.address.lga || '--'}}</h6>
                </div>
                <div v-if="user.address" class="col-md-6">
                    <label>State:</label>
                    <h6>{{user.address.state || '--'}}</h6>
                </div>
                <div v-if="user.address" class="col-md-6">
                    <label>Country:</label>
                    <h6>{{user.address.country || '--'}}</h6>
                </div>

        </div>

    </div>

</template>

<script>
export default {
    name: "ViewUser",
    props: ['raw_user'],

    data(){

        return{

            user: JSON.parse(this.raw_user)

        }
    },

}
</script>

<style scoped>

    h6{
        color: #232B35;
        line-height: 1.3em;
        margin-bottom: 15px;
    }

    img{
        height: 150px;
        width: 150px;
        border-radius: 8px;
        border: 2px solid #c4cbd4;
    }

</style>
