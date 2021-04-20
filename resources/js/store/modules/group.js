import Axios from 'axios'
const baseUrl = 'admin/group'

export default {
    namespaced: true,
    state: {
        states: [],
        countries: [],
    },

    getters: {
        states(state){
            return state.states
        },
        countries(state){
            return state.countries
        }
    },

    actions: {
        groupOrdersByWeekDay({ state, commit }){
            return Axios.get(`/${baseUrl}/week/days`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
        groupOrdersByMonth({ state, commit }){
            return Axios.get(`/${baseUrl}/month`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
        groupOrdersStatistics({ state, commit }, query = ''){
            return Axios.get(`/admin/orders/statistics/get?${query}`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setStates(state, states){
            return state['states'] = states;
        },
        setCountries(state, countries){
            return state['countries'] = countries;
        },
    }
}
