<template>
    <div class="card-body">
        <form @submit.prevent="updateConfig" class="" id="addProductForm">
            <div class="row">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Home Carousel Image 1 <sup>*</sup></label>
                        <div class="row">
                            <div v-if="config.home_carousel_image_1" class="col-1">
                                <img :src="config.home_carousel_image_1" width="50" height="40" alt="">
                            </div>
                            <div class="col-11">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  @change="homeCarouselImage1" ref="front_image" class="custom-file-input form-control" />
                                        <label class="custom-file-label" for="">Choose Home Carousel Image 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback" v-if="errors.hasError('home_carousel_image_1')">{{ errors.first('home_carousel_image_1') }}</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Home Carousel Image 2 <sup>*</sup></label>
                        <div class="row">
                            <div v-if="config.home_carousel_image_2" class="col-1">
                                <img :src="config.home_carousel_image_2" width="50" height="40" alt="">
                            </div>
                            <div class="col-11">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  @change="homeCarouselImage2" ref="front_image" class="custom-file-input form-control" />
                                        <label class="custom-file-label" for="">Choose Home Carousel Image 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback" v-if="errors.hasError('home_carousel_image_2')">{{ errors.first('home_carousel_image_2') }}</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Home Carousel Image 3 <sup>*</sup></label>
                        <div class="row">
                            <div v-if="config.home_carousel_image_3" class="col-1">
                                <img :src="config.home_carousel_image_3" width="50" height="40" alt="">
                            </div>
                            <div class="col-11">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  @change="homeCarouselImage3" ref="front_image" class="custom-file-input form-control" />
                                        <label class="custom-file-label" for="">Choose Home Carousel Image 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback" v-if="errors.hasError('home_carousel_image_3')">{{ errors.first('home_carousel_image_3') }}</div>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Top 1 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_top_1" name="home_caption_top_1" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_top_1')">{{ errors.first('home_caption_top_1') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Bottom 1 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_bottom_1" name="home_caption_bottom_1" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_bottom_1')">{{ errors.first('home_caption_bottom_1') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Home Link 1 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_link_1" name="home_caption_bottom_1" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_link_1')">{{ errors.first('home_link_1') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Top 2 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_top_2" name="home_caption_top_2" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_top_2')">{{ errors.first('home_caption_top_2') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Bottom 2 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_bottom_2" name="home_caption_bottom_2" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_bottom_2')">{{ errors.first('home_caption_bottom_2') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Home Link 2 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_link_2" name="home_link_2" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_link_2')">{{ errors.first('home_link_2') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Top 3 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_top_3" name="name" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_top_3')">{{ errors.first('home_caption_top_3') }}</div>
                    </div>
                    <hr>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Caption Bottom 3 <sup>*</sup></label>
                        <input type="text"  v-model="config.home_caption_bottom_3" name="name" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_caption_bottom_3')">{{ errors.first('home_caption_bottom_3') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Home Link 3<sup>*</sup></label>
                        <input type="text"  v-model="config.home_link_3" name="home_link_3" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('home_link_3')">{{ errors.first('home_link_3') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Product <sup>*</sup></label>
                        <multiselect
                            v-model="product"
                            :options="allProducts"
                            :searchable="true"
                            track-by="id"
                            label="name"
                            @input="onProductChange"
                            placeholder="Select Product"
                        ></multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('featured_product')">{{ errors.first('featured_product') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Category <sup>*</sup></label>
                        <multiselect
                            v-model="category"
                            :options="allCategories"
                            :searchable="true"
                            @input="onCategoryChange"
                            track-by="id"
                            label="name"
                            placeholder="Select Category"
                        ></multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('featured_category')">{{ errors.first('featured_category') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Min Amount Free Delivery <sup>*</sup></label>
                            <div class="input-group">
                                <div class="input-group-append"><span class="input-group-text">₦</span></div>
                                <input v-model="config.min_amount_free_delivery" required class="form-control" type="number" min="500" name="min_amount_free_delivery" autocomplete="off">
                                <div class="invalid-feedback" v-if="errors.hasError('min_amount_free_delivery')">{{ errors.first('min_amount_free_delivery') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Flat Lagos Delivery Fee<sup>*</sup></label>
                            <div class="input-group">
                                <div class="input-group-append"><span class="input-group-text">₦</span></div>
                                <input v-model="config.flat_lagos_delivery_fee" required class="form-control" type="number" min="500" name="min_amount_free_delivery" autocomplete="off">
                                <div class="invalid-feedback" v-if="errors.hasError('flat_lagos_delivery_fee')">{{ errors.first('flat_lagos_delivery_fee') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Flat Farther Lagos Delivery Fee <sup>*</sup></label>
                            <div class="input-group">
                                <div class="input-group-append"><span class="input-group-text">₦</span></div>
                                <input v-model="config.flat_farther_lagos_delivery_fee" required class="form-control" type="number" min="500" name="min_amount_free_delivery" autocomplete="off">
                                <div class="invalid-feedback" v-if="errors.hasError('flat_farther_lagos_delivery_fee')">{{ errors.first('flat_farther_lagos_delivery_fee') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Flat Outside Lagos Delivery Fee <sup>*</sup></label>
                            <div class="input-group">
                                <div class="input-group-append"><span class="input-group-text">₦</span></div>
                                <input v-model="config.flat_outside_lagos_delivery_fee" required class="form-control" type="number" min="500" name="min_amount_free_delivery" autocomplete="off">
                                <div class="invalid-feedback" v-if="errors.hasError('flat_outside_lagos_delivery_fee')">{{ errors.first('flat_outside_lagos_delivery_fee') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="custom-switch mt-2">
                            <input v-model="config.delivery_free" type="checkbox" name="delivery_free" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Free Delivery</span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Farther Lagos LGAs</label>
                        <multiselect v-model="config.farther_lagos_lgas" tag-placeholder="Farther Lagos LGAs" placeholder="Search or add a LGA"
                                     :options="lagosLgas" :multiple="true" :taggable="true">
                        </multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('available_colors')">{{ errors.first('available_colors') }}</div>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Contact Email<sup>*</sup></label>
                        <input type="email"  v-model="config.contact_email" name="contact_email" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('contact_email')">{{ errors.first('contact_email') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Contact Phone<sup>*</sup></label>
                        <input type="text"  v-model="config.contact_phone" name="name" style="" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('contact_phone')">{{ errors.first('contact_phone') }}</div>
                    </div>

                </div>

            </div>
            <div class="mt-4 pull-right" style="">
                <button type="submit" :disabled="disabled" class="btn btn-primary text-center btn-lg btn-block">
                    <span>Update Config </span>
                    <i class="fas fa-spinner fa-pulse" v-if="disabled"></i>
                </button>
            </div>
        </form>

    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
import pagination from "laravel-vue-pagination";
import ErrorBag from "../error_bag";
class Config{

    constructor(config) {
        this.id = config.id || '';
        this.home_carousel_image_1 = config.home_carousel_image_1 || '';
        this.home_carousel_image_2 = config.home_carousel_image_2 || '';
        this.home_carousel_image_3 = config.home_carousel_image_3 || '';

        this.home_caption_top_1 = config.home_caption_top_1 || '';
        this.home_caption_bottom_1 = config.home_caption_bottom_1 || '';
        this.home_link_1 = config.home_link_1 || '';

        this.home_caption_top_2 = config.home_caption_top_2 || '';
        this.home_caption_bottom_2 = config.home_caption_bottom_2 || '';
        this.home_link_2 = config.home_link_2 || '';

        this.home_caption_top_3 = config.home_caption_top_3 || '';
        this.home_caption_bottom_3 = config.home_caption_bottom_3 || '';
        this.home_link_3 = config.home_link_3 || '';

        this.featured_product = config.featured_product || '';
        this.product = config.product || '';
        this.featured_category = config.featured_category || '';
        this.category = config.category || '';

        this.delivery_free = config.delivery_free || false;
        this.min_amount_free_delivery = config.min_amount_free_delivery || '';
        this.flat_lagos_delivery_fee = config.flat_lagos_delivery_fee || '';
        this.flat_farther_lagos_delivery_fee = config.flat_farther_lagos_delivery_fee || '';
        this.farther_lagos_lgas = config.farther_lagos_lgas || '';
        this.farther_lagos_lg = config.farther_lagos_lg || [];
        this.flat_outside_lagos_delivery_fee = config.flat_outside_lagos_delivery_fee || '';

        this.contact_email = config.contact_email || '';
        this.contact_phone = config.contact_phone || '';
    }

}

export default {
    name: "Config",

    props: ['raw_config'],

    components: {Multiselect},

    data(){

        return {

            config: new Config(JSON.parse(this.raw_config)),
            category: '',
            product: '',
            lagosLgas: [],
            disabled: false,
            errors: new ErrorBag({}),

        }

    },

    computed: {

        ...mapGetters({
            allCategories: 'categories_admin/allCategories',
            allProducts: 'products_admin/allProducts',
        })
    },

    mounted() {

        this.getAllCategories({})
        this.getAllProducts({})
        this.getNigeriaStatesLGA(25).then((data) => {

            this.lagosLgas = data

        })
        Object.assign(this.config, {

            farther_lagos_lgas: this.config.farther_lagos_lg,

        })
        if(this.config.category) this.category = this.config.category
        if(this.config.product) this.product = this.config.product
    },

    methods: {
        ...mapActions({
            getNigeriaStatesLGA: 'locality/getNigeriaStatesLGA',
            getAllCategories: 'categories_admin/getAllCategories',
            getAllProducts: 'products_admin/getAllProducts',
        }),
        onCategoryChange(val){
            this.config.featured_category = '';
            if (val) {
                this.config.featured_category = val.id;
            }
        },
        onProductChange(val){
            this.config.featured_product = '';
            if (val) {
                this.config.featured_product = val.id;
            }
        },
        readImage(img) {
            let reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            let vm = this;
            reader.onload = function () {
                vm.config[img] = reader.result
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        },

        homeCarouselImage1(){
            this.readImage('home_carousel_image_1');
        },
        homeCarouselImage2(){
            this.readImage('home_carousel_image_2');
        },
        homeCarouselImage3(){
            this.readImage('home_carousel_image_3');
        },
        updateConfig(){

            if (this.errors.hasErrors()) this.errors.clearAll()

            this.disabled = true
            this.$http.put(`/admin/config/${this.config.id}`, this.config).then(res => {

                this.disabled = false;
                this.notifSuceess('Config Updated Successfully!!!')
                console.log(res.data)

            }).catch(err => {
                this.disabled = false;
                console.log(err.response)
                if (err.response && err.response.status == 422) {
                    const errors = err.response.data.errors;
                    this.errors.setErrors(errors);
                }
                this.notifError( err.message || 'An error occurred')

            })

        },


    }
}
</script>

<style scoped>
.invalid-feedback{
    display: block !important;
}
</style>
