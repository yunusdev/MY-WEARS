import Axios from 'axios'
const baseUrl = 'admin'

export default {
    namespaced: true,
    state: {
        allCategories: [],
        allSubcategories: [],
    },

    getters: {
        allCategories(state){
            return state.allCategories
        },
        allSubcategories(state){
            return state.allSubcategories
        },
    },

    actions: {
        getAllCategories({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/categories/all`).then(res => {
                commit('setAllCategories', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
        getAllSubcategories({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/sub-categories/all`).then(res => {
                commit('setAllSubcategories', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setAllCategories(state, data){
            return state['allCategories'] = data;
        },

        setAllSubcategories(state, data){
            return state['allSubcategories'] = data;
        },
    }
}
