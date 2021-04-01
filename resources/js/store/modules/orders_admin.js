import Axios from 'axios'
const baseUrl = 'admin/orders'

export default {
    namespaced: true,
    state: {
        allOrderStatus: [],
    },

    getters: {
        allOrderStatus(state){
            return state.allOrderStatus
        },
    },

    actions: {
        getAllStatus({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/statuses`).then(res => {
                commit('setAllOrderStatus', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setAllOrderStatus(state, data){
            return state['allOrderStatus'] = data;
        },
    }
}
