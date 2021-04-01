import Axios from 'axios'
const baseUrl = 'admin/users'

export default {
    namespaced: true,
    state: {
        allUsers: [],
    },

    getters: {
        allUsers(state){
            return state.allUsers
        },
    },

    actions: {
        getAllUsers({ state, commit }, {reset = false}){
            return Axios.get(`/${baseUrl}/all`).then(res => {
                commit('setAllUsers', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })

        },
    },
    mutations: {

        setAllUsers(state, data){
            return state['allUsers'] = data;
        },
    }
}
