import Axios from 'axios'
const baseUrl = 'admin/coupons'

export default {
    namespaced: true,
    state: {
        allCoupons: [],
    },

    getters: {
        allCoupons(state){
            return state.allCoupons
        },
    },

    actions: {
        getAllCoupons({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/all`).then(res => {
                commit('setAllCoupons', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setAllCoupons(state, data){
            return state['allCoupons'] = data;
        },
    }
}
