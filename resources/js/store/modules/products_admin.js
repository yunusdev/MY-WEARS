import Axios from 'axios'
const baseUrl = 'admin/products'

export default {
    namespaced: true,
    state: {
        allProducts: [],
    },

    getters: {
        allProducts(state){
            return state.allProducts
        },
    },

    actions: {
        getAllProducts({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/all`).then(res => {
                commit('setAllProducts', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setAllProducts(state, data){
            return state['allProducts'] = data;
        },
    }
}
