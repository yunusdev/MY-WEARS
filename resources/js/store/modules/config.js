import Axios from 'axios'
const baseUrl = 'config'

export default {
    namespaced: true,
    state: {
        config: null,
    },

    getters: {
        config(state){
            return state.config
        },
    },

    actions: {
        getConfig({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}`).then(res => {
                commit('setConfig', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setConfig(state, config){
            return state['config'] = config;
        },
    }
}
