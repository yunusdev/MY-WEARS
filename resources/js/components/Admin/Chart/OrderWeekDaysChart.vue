<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h4>Group Total Amount By Week Days</h4>
            </div>
            <div class="card-body">
                <canvas id="chart-week"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import Chart from "chart.js";

export default {
    name: "OrderWeekDaysChart",

    data(){

        return {
            data: {
                type: "line",
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    datasets: [

                    ]
                },
                options: {
                    responsive: true,
                    lineTension: 1,
                    // scales: {
                    //     x: {
                    //         stacked: true,
                    //     },
                    //     y: {
                    //         stacked: true
                    //     }
                    // }
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return 'N' + value;
                                }
                            }
                        }],
                    }
                }
            }

        }

    },

    async mounted(){

        await this.groupOrdersByWeekDay().then((data) => {

            const labels = []
            const earnings = []
            const totalAmt = []
            const counts = []

            // data.forEach((item) => {
            //     labels.push(item.weekDay)
            //     earnings.push(item.earnings)
            //     counts.push(item.count)
            // })

            this.data.data.labels.forEach((day) => {

                const index = data.findIndex(item => item.weekDay === day)

                if(index >= 0){
                    const item = data[index]
                    earnings.push(item.earnings)
                    totalAmt.push(item.totalAmt)
                    counts.push(item.count)

                }else{
                    earnings.push(0)
                    counts.push(0)
                    totalAmt.push(0)
                }


            })

            // this.data.data.labels = labels
            this.data.data.datasets.push({
                label: "Order Total Amt",
                data: totalAmt,
                backgroundColor: "rgba(54,73,93,.5)",
                borderColor: "#36495d",
                borderWidth: 3,
                pointBackgroundColor: 'transparent',
                pointBorderColor: 'transparent',
                pointRadius: 4
            })
            this.data.data.datasets.push({
                label: "Order Earnings",
                data: earnings,
                backgroundColor: "rgba(71, 183,132,.5)",
                borderColor: "#47b784",
                borderWidth: 3,
            })

        //
        })
        const ctx = document.getElementById('chart-week');
        new Chart(ctx, this.data);
    },

    methods: {
        ...mapActions({
            groupOrdersByWeekDay: 'group/groupOrdersByWeekDay',
        }),

    }
}
</script>

<style scoped>

</style>
