<template>

    <div class="">
        <div class="row">
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Created At (From):</label>
                <input v-model="search.createdFrom" class="form-control" type="date">
            </div>
            <div class=" col-md-3 col-xs-12 form-group">
                <label for="">Created At (To):</label>
                <input v-model="search.createdTo" class="form-control" type="date">
            </div>
            <div class="col-md-3 col-xs-12 form-group">
                <label for="">Status:</label>
                <select v-model="search.status" class="form-control">
                    <option value="">Select Status</option>
                    <option v-for="status in statuses" :value="status">{{ status }}</option>
                </select>
            </div>
            <div class="col-md-3 form-group col-sm-12">
                <label for="">Actions:</label>
                <div class="">
                    <button
                        :disabled="disabled"
                        @click="getCustomDateStat()"
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
        <spinner v-if="!data"></spinner>
        <div v-else class="box-body">
            <table id="example1"  class=" table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Order Count</th>
                    <th>Num Of Items</th>
                    <th>Order Amount</th>
                    <th>Delivery Fees</th>
                    <th>Coupon Total</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="data.custom">
                    <th>Custom Date</th>
                    <td>{{ data.custom.count }}</td>
                    <td>{{ data.custom.numOfItems }}</td>
                    <td>N{{ data.custom.subTotalAmount | formatMoney  }}</td>
                    <td>N{{ data.custom.deliveryFee | formatMoney  }}</td>
                    <td>N{{ data.custom.couponDiscount | formatMoney }}</td>
                    <td>N{{ data.custom.totalAmt  | formatMoney }}</td>
                </tr>
                <tr>
                    <th>Current Week</th>
                    <td>{{ data.week.count }}</td>
                    <td>{{ data.week.numOfItems }}</td>
                    <td>N{{ data.week.subTotalAmount | formatMoney  }}</td>
                    <td>N{{ data.week.deliveryFee | formatMoney  }}</td>
                    <td>N{{ data.week.couponDiscount | formatMoney }}</td>
                    <td>N{{ data.week.totalAmt  | formatMoney }}</td>
                </tr>
                <tr>
                    <th>Current Month</th>
                    <td>{{ data.month.count }}</td>
                    <td>{{ data.month.numOfItems }}</td>
                    <td>N{{ data.month.subTotalAmount | formatMoney }}</td>
                    <td>N{{ data.month.deliveryFee | formatMoney  }}</td>
                    <td>N{{ data.month.couponDiscount | formatMoney  }}</td>
                    <td>N{{ data.month.totalAmt | formatMoney  }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ data.all.count }}</td>
                    <td>{{ data.all.numOfItems }}</td>
                    <td>N{{ data.all.subTotalAmount | formatMoney }}</td>
                    <td>N{{ data.all.deliveryFee | formatMoney  }}</td>
                    <td>N{{ data.all.couponDiscount| formatMoney  }}</td>
                    <td>N{{ data.all.totalAmt | formatMoney }}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Order Count</th>
                    <th>Num Of Items</th>
                    <th>Order Amount</th>
                    <th>Delivery Fees</th>
                    <th>Coupon Total</th>
                    <th>Total</th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</template>

<script>
import {mapActions, mapGetters} from "vuex";
import Spinner from "../../User/Spinner";
const searchQuery = {
    createdFrom: '',
    createdTo: '',
    status: '',
}
export default {
    name: "OrdersStats",


    data(){

        return {

            data: null,
            disabled: false,
            search: {...searchQuery},

        }

    },

    components: {Spinner},

    computed: {

        ...mapGetters({
            statuses: 'orders_admin/allOrderStatus',
        })

    },

    async mounted() {

        this.data = await this.groupOrdersStatistics();
        await this.getAllOrderStatus({});

    },

    methods: {
        ...mapActions({
            groupOrdersStatistics: 'group/groupOrdersStatistics',
            serialize: 'shop/serialize',
            getAllOrderStatus: 'orders_admin/getAllStatus',

        }),

        async clear(){
            Object.assign(this.search, {...searchQuery})
            this.data = await this.groupOrdersStatistics();
        },

        async getCustomDateStat(){

            this.disabled = true
            let query = await this.serialize(this.search);
            this.data = await this.groupOrdersStatistics(query);
            this.disabled = false


        }
    }
}
</script>

<style scoped>

</style>
