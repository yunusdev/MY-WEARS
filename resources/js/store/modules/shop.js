import Axios from 'axios'
const baseUrl = 'shop'

export default {
    namespaced: true,
    state: {
        categories: [],
        trending_products: [],
        top_selling_products: [],
        new_arrivals_products: [],
        product_price_range: null,
    },

    getters: {
        categories(state){
            return state.categories
        },
        trendingProducts(state){
            return state.trending_products
        },
        topSellingProducts(state){
            return state.top_selling_products
        },
        newArrivalsProducts(state){
            return state.new_arrivals_products
        },
        productPriceRange(state){
            return state.product_price_range
        }
    },

    actions: {
        getCategories({ state, commit }, {reset = false}){
            // if(!reset && state.categories.length > 0){
            //     return;
            // }
            return Axios.get(`/${baseUrl}/categories`).then(res => {
                commit('setCategories', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        getProducts({ state, commit }, {page = 1, price = false, category,
            sub_category, order_by, sort_type, price_range, search_by_text  }){
            if (typeof page === 'undefined' || !page) {
                page = 1;
            }
            let query = '';
            if(category){
                query += `&category=${category.id}`
            }
            if(sub_category){
                query += `&subCategory=${sub_category.id}`
            }
            if(order_by && sort_type){
                if(sort_type === 'desc'){
                    query += `&orderByDesc=${order_by}`
                }else{
                    query += `&orderByAsc=${order_by}`
                }
            }
            if (price_range && price_range.min && price_range.max){
                query += `&minPrice=${price_range.min}&maxPrice=${price_range.max}`
            }
            if(search_by_text){
                query += `&searchByText=${search_by_text}`
            }
            return Axios.get(`/${baseUrl}/products?page=${page}${query}`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },

        getTrendingProducts({ state, commit }, {reset = false}){
            // if(!reset && state.trending_products.length > 0){
            //     return;
            // }
            return Axios.get(`/${baseUrl}/trending/products`).then(res => {
                commit('setTrendingProducts', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        incrementProductViewCount({ state, commit }, productId){
            return Axios.get(`/${baseUrl}/increment/product_views/${productId}`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        getRelatedProducts({ state, commit }, productId){
            return Axios.get(`/${baseUrl}/related/products/${productId}`).then(res => {
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        getTopSellingProducts({ state, commit }, {reset = false, num = 3}){
            // if(!reset && state.top_selling_products.length > 0 && num && num <= state.top_selling_products.length){
            //     return;
            // }
            return Axios.get(`/${baseUrl}/top/sellers/${num}`).then(res => {
                commit('setTopSellingProducts', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        getNewArrivalsProducts({ state, commit }, {reset = false}){
            // if(!reset && state.new_arrivals_products.length > 0){
            //     return;
            // }
            return Axios.get(`/${baseUrl}/new/arrivals`).then(res => {
                commit('setNewArrivalsProducts', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },
        getProductPriceRange({ state, commit }){
            return Axios.get(`/${baseUrl}/price/range`).then(res => {
                commit('setProductPriceRange', res.data)
                return res.data
            }).catch(err => {
                return Promise.reject(err)
            })
        },

        serialize({state, commit}, obj){
            const str = [];
            for (let p in obj)
                if (obj.hasOwnProperty(p)) {
                    if (encodeURIComponent(obj[p])) str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                }
            return str.join("&");
        },
    },
    mutations: {

        setCategories(state, categories){
            return state['categories'] = categories;
        },
        setTrendingProducts(state, trending_products){
            return state['trending_products'] = trending_products;
        },
        setTopSellingProducts(state, top_selling_products){
            return state['top_selling_products'] = top_selling_products;
        },
        setNewArrivalsProducts(state, new_arrivals_products){
            return state['new_arrivals_products'] = new_arrivals_products;
        },

        setProductPriceRange(state, data){
            return state['product_price_range'] = data;
        },
    }
}
