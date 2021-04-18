<template>

    <div class="card-body">
        <form @submit.prevent="editProduct" class="" id="addProductForm">
            <div class="row">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Name <sup>*</sup></label>
                        <input type="text"  v-model="product.name" name="name" class="form-control" required/>
                        <div class="invalid-feedback" v-if="errors.hasError('name')">{{ errors.first('name') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Class</label>
                        <select v-model="product.class" name="class" class="form-control" required>
                            <option value="">--Select Class--</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Children</option>
                            <option>Unisex</option>
                            <option>Not Applicable</option>
                        </select>
                        <div class="invalid-feedback" v-if="errors.hasError('class')">{{ errors.first('class') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Category <sup>*</sup></label>
                        <multiselect @input="onCategoryChange" v-model="product_category" :options="categories" track-by="name" label="name" :searchable="true" :close-on-select="true"
                                     :show-labels="false" placeholder="Search Category List">
                        </multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('category_id')">{{ errors.first('category_id') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Sub-Category <sup>*</sup></label>
                        <multiselect v-model="product_sub_category" :options="sub_categories" track-by="name" label="name" :searchable="true" :close-on-select="true"
                                     :show-labels="false" placeholder="Search Sub Category List">
                        </multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('sub_category_id')">{{ errors.first('sub_category_id') }}</div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Unit Price <sup>*</sup></label>
                            <div class="input-group">
                                <div class="input-group-append"><span class="input-group-text">₦</span></div>
                                <input v-model="product.price" required class="form-control" type="number" name="price" autocomplete="off">
                                <div class="invalid-feedback" v-if="errors.hasError('price')">{{ errors.first('price') }}</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Weight</label>
                            <div :class="{'is-invalid': errors.hasError('weight')}" class="input-group">
                                <input v-model="product.weight" :class="{'is-invalid': errors.hasError('weight')}"  class="form-control" type="number" name="weight" autocomplete="off">
                                <div class="input-group-append"><span class="input-group-text">kg</span></div>
                            </div>
                        </div>
                        <div class="invalid-feedback" v-if="errors.hasError('product_weight')">{{ errors.first('weight') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Available Quantity <sup>*</sup></label>
                            <input v-model="product.quantity" class="form-control" type="number" name="quantity" autocomplete="off">

                            <div class="invalid-feedback" v-if="errors.hasError('quantity')">{{ errors.first('quantity') }}</div>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Available Colors</label>
                        <multiselect v-model="product.available_colors" tag-placeholder="Add new color" placeholder="Search or add a color"
                                     :options="color_options" :multiple="true" :taggable="true">
                        </multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('available_colors')">{{ errors.first('available_colors') }}</div>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Available Sizes</label>
                        <multiselect v-model="product.available_sizes" tag-placeholder="Add new size" placeholder="Search or add a size"
                                     :options="size_options" :multiple="true" :taggable="true">
                        </multiselect>
                        <div class="invalid-feedback" v-if="errors.hasError('available_sizes')">{{ errors.first('available_sizes') }}</div>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Front View Image <sup>*</sup></label>

                        <div class="row">
                            <div class="col-1">
                                <img :src="product.front_image" width="50" height="40" alt="">
                            </div>
                            <div class="col-11">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  @change="frontViewImage" ref="front_image" class="custom-file-input form-control" />
                                        <label class="custom-file-label" for="">Choose front view image</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invalid-feedback" v-if="errors.hasError('front_image')">{{ errors.first('front_image') }}</div>
                    </div>
                    <div class="col-md-2">
                        <label class="custom-switch mt-2">
                            <input v-model="product.available" type="checkbox" name="available" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Available</span>
                        </label>
                    </div>

                    <div class="col-md-2">
                        <label class="custom-switch mt-2">
                            <input v-model="product.featured" type="checkbox" name="featured" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Featured</span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="custom-switch mt-2">
                            <input v-model="product.verified" type="checkbox" name="verified" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Verified</span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Description</label>
                        <textarea v-model="product.description" name="description" required class="form-control" cols="10" rows="5"></textarea>
                        <div class="invalid-feedback" v-if="errors.hasError('description')">{{ errors.first('description') }}</div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="form-label">Image Check</label>
                            <div class="row ml-1">
                                <div v-for="image in product.product_images" class="mr-2">
                                    <label class="imagecheck">
                                        <input name="imagecheck"  v-model="selected_images" type="checkbox" :value="image.id" class="imagecheck-input">
                                        <figure class="imagecheck-figure">
                                            <img width="105" height="80" :src="image.path" alt="}" class="imagecheck-image">
                                        </figure>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button @click="deleteSelectedImages" type="button" class="btn btn-danger" :disabled="selected_images.length === 0">
                                Delete Selected Images
                            </button>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="my-2 col-form-label"> <i class="fas fa-info-circle"></i> Images</label>
                        <main class="col px-2">
                            <vue-dropzone
                                id="dropzone"
                                ref="myVueDropzone"
                                :use-custom-slot="true"
                                :options="dropzoneOptions"
                                @vdropzone-complete="afterComplete"
                                @vdropzone-removed-file="removeThisFile"
                                @vdropzone-file-added="preUpload"
                                class="px-2"
                            >
                                <div class="dropzone-custom-content">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </vue-dropzone>
                        </main>
                        <div class="invalid-feedback" v-if="errors.hasError('images')">{{ errors.first('images') }}</div>
                    </div>

                </div>

            </div>
            <div class="mt-4 pull-right" style="">
                <button type="submit" :disabled="disabled" class="btn btn-primary text-center btn-lg btn-block">
                    <span>Update Product </span>
                    <i class="fas fa-spinner fa-pulse" v-if="disabled"></i>
                </button>
            </div>
        </form>

    </div>


</template>

<script>
import Multiselect from "vue-multiselect";
import "vue-multiselect/dist/vue-multiselect.min.css";
import ErrorBag from '../../error_bag'
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import Swal from "sweetalert";

class Product{

    constructor(product) {

        this.id = product.id || '';
        this.category = product.category || {};
        this.category_id = product.category_id || '';
        this.sub_category = product.sub_category || {};
        this.sub_category_id = product.sub_category_id || '';
        this.name = product.name || '';
        this.class = product.class || '';
        this.description = product.description || '';
        this.weight = product.weight || '';
        this.price = product.price || '';
        this.quantity = product.quantity || '';
        this.available_sizes = product.available_sizes || [];
        this.available_colors = product.available_colors || [];
        this.colors = product.colors || [];
        this.sizes = product.sizes || [];
        this.front_image = product.front_image || '';
        this.available = product.available || true;
        this.featured = product.featured || false;
        this.verified = product.verified || false;
        this.images = product.images || []
        this.product_images = product.product_images || []

    }

}


export default {
    name: "editProduct",

    components: {Multiselect, vueDropzone: vue2Dropzone},

    props: ['raw_categories', 'raw_product'],

    data(){

        return {

            categories: JSON.parse(this.raw_categories),
            sub_categories: [],
            product_category: '',
            errors: new ErrorBag({}),
            disabled: false,
            product_sub_category: '',
            product: new Product(JSON.parse(this.raw_product)),
            size_options: ['35', '36', '37', '38', '39', '40', '41', '42'],
            color_options: ['Red', 'Black', 'Blue', 'Pink', 'White', 'Yellow', 'Green', 'Purple', 'Indigo', 'Velvet'],
            dropzoneOptions: {
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                addRemoveLinks: true,
                maxFilesize: 1.0,
                headers: { 'My-Awesome-Header': 'header value' }
            },
            selected_images: []

        }

    },

    mounted() {

        Object.assign(this.product, {

            available_colors: this.product.colors,
            available_sizes: this.product.sizes,
        })
        this.product_category = this.product.category
        this.product_sub_category = this.product.sub_category
    },

    watch: {

        product_category: function (val) {



        },

        product_sub_category: function (val) {

            if (val) this.product.sub_category_id = val.id;

        }
    },

    methods: {

        onCategoryChange(val){
            this.product_sub_category = '';
            this.product.sub_category_id  = '';
            if (val) {
                this.product.category_id = val.id;
                this.fetchProductSubCategory(val.id);
            }
        },

        fetchProductSubCategory(category_id){

            this.$http.get(`/admin/${category_id}/sub-categories`).then(res => {

                this.sub_categories = res.data;

            }).catch(err => {

                console.log(err.response);

            })

        },

        frontViewImage(event){
            let reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            let vm = this;
            reader.onload = function () {
                vm.product.front_image = reader.result
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        },

        afterComplete(file){
            this.product.images.push(file.dataURL)
            console.log(this.product.images)
        },

        removeThisFile(file) {
            const index = this.product.images.indexOf(file.dataURL)
            this.product.images.splice(index, 1);
            console.log(this.product.images)
        },

        deleteSelectedImages() {

            Swal('Are you sure want to delete the selected images', {
                buttons: ['Oh no!', true]
            }).then(value => {
                if (value) {
                    this.$http.put(`/admin/products/delete/images`, {

                        images: this.selected_images

                    }).then(res => {

                        console.log('>>>>>> res')
                        window.location.reload();
                        this.notifSuceess('Images deleted successfully');

                    }).catch(err => {
                        console.log('>>>>>> errror')
                        this.notifError( err.message || 'An error occurred')
                    })

                }
            })

        },

        editProduct(){

            if (this.errors.hasErrors()) this.errors.clearAll()

            this.disabled = true
            this.$http.put(`/admin/products/${this.product.id}`, this.product).then(res => {

                this.disabled = false;
                this.notifSuceess('Product Updated Successfully!!!')

                // window.location = '/admin/products'
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

        }

    }

}
</script>

<style scoped>

textarea{
    height: 100px !important;
}

.invalid-feedback{
    display: block !important;
}

</style>
