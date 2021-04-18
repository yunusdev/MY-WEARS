import Vue from 'vue'
import Vuex from 'vuex'
import cart from './modules/cart'
import shop from './modules/shop'
import account from './modules/account'
import locality from './modules/locality'
import users from './modules/users'
import coupons_admin from './modules/coupons_admin'
import orders_admin from './modules/orders_admin'
import categories_admin from './modules/categories_admin'
import products_admin from './modules/products_admin'
import group from './modules/group'
import config from './modules/config'
import createPersistedState from 'vuex-persistedstate'
Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        cart,
        locality,
        account,
        shop,
        users,
        coupons_admin,
        orders_admin,
        categories_admin,
        products_admin,
        group,
        config,
    },
    plugins: [
        createPersistedState({
            storage: {
                getItem: key => localStorage.getItem(key),
                setItem: (key, value) => localStorage.setItem(key, value),
                removeItem: key => localStorage.removeItem(key)
            }
        })
    ],
    mutations: {
        setItems(state, { resource, items }) {
            state[resource].items = items
        },
        setActiveItems(state, { resource, activeItems }) {
            state[resource].activeItems = activeItems
        },
        setActiveItem(state, { resource, activeItem }) {
            state[resource].activeItem = activeItem
        },
        setItem(state, { resource, item }) {
            state[resource].item = item
        },
        addItemToArray(state, { item, index, resource }) {
            Vue.set(state[resource].items, index, item)
        }
    }
})
