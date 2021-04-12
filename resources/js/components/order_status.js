exports.getOrderStatusColor = (status) => {

    switch (status){

        case 'Initiated': {

            return '-primary'

        }
        case 'Processing': {

            return '-blue'

        }
        case 'Shipped': {

            return '-warning'

        }
        case 'Delivered': {

            return '-success'

        }
        case 'Cancelled': {

            return '-danger'

        }

        default: {

            return '-secondary'

        }


    }

}
