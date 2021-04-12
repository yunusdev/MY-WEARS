exports.getOrderStatusColor = (status) => {

    switch (status){

        case 'Initiated': {

            return '-primary'

        }
        case 'Processing': {

            return '-blue'

        }
        case 'Prepared': {

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

exports.getOrderStatusText = (status) => {

    switch (status){

        case 'Initiated': {

            return 'Confirmed Order'

        }
        case 'Processing': {

            return 'Processing Order'

        }
        case 'Prepared': {

            return 'Prepared Order'

        }
        case 'Shipped': {

            return 'Order Dispatched'

        }
        case 'Delivered': {

            return 'Order Delivered'

        }
        case 'Cancelled': {

            return 'Order cancelled'

        }

    }

}

exports.getOrderStatusTrackIcon = (status) => {

    switch (status){

        case 'Initiated': {

            return 'pe-7s-cart'

        }
        case 'Processing': {

            return 'pe-7s-config'

        }
        case 'Prepared': {

            return 'pe-7s-medal'

        }
        case 'Shipped': {

            return 'pe-7s-car'

        }
        case 'Delivered': {

            return 'pe-7s-home'

        }
        case 'Cancelled': {

            return 'pe-7s-medal'

        }

    }

}
