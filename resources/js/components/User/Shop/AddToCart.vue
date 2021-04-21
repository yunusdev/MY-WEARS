<template>

    <div class="modal fade" id="addToCart" data-backdrop="false" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add To Cart</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form @submit.prevent="addToCart()">
                    <div class="modal-body">

                        <div class="row font-weight-bold  mb-2">
                            <div class="col-1 " style="">
                            </div>
                            <div class="col-3 " style="">
                                <span class="">Size</span>
                            </div>
                            <div class="col-4" style="">
                                Color
                            </div>
                            <div class="col-3 " style="">
                                Quantity
                            </div>
                        </div>

                        <div v-for="item, key in items" class="row no-gutters">

                            <div class="col-1 text-center" style="">
                                <a class="remove-from-cart text-center mt-2 text-danger cursor" @click="removeItem(item)" data-toggle="tooltip" title="Remove item">
                                    <i class="icon-cross"></i>
                                </a>
                            </div>
                            <div class="col-3">
                                <select required  v-model="item.size" class="form-control mb-2 form-control-sm form-control-rounded">
                                    <option value="">Select</option>
                                    <option v-for="size in sizes">{{ size }}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select required v-model="item.color" class="form-control mb-2 form-control-sm form-control-rounded">
                                    <option value="">Select</option>
                                    <option v-for="color in colors">{{ color }}</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select required v-model="item.quantity"  class="form-control mb-2 form-control-sm form-control-rounded">
                                    <option value="">Select</option>
                                    <option  v-for="index in 11" :key="index" >{{index}}</option>
                                </select>
                            </div>
                        </div>
                        <div class=" text-center">
                            <button style="" class="mt-2 mb-3 btn btn-sm btn-secondary" @click="addMore()">
                                <i class="fas fa-plus"></i> Select More</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Add To cart</button>
<!--                        <button class="btn btn-primary btn-sm" type="button">Checkout</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: "AddToCart",

    props: ['sizes', 'colors', 'product'],

    data(){

      return {

          items: [],
          item: {
              product_id: this.product.id,
              product_name: this.product.name,
              product: this.product,
              product_price: this.product.price,
              size: '',
              color: '',
              quantity: '',
          }

      }

    },

    async mounted() {

        await this.getUserCartItems()
        this.items.push({...this.item})
        this.$parent.$on('show-add-cart', () => {
            $('#addToCart').modal()
        })

    },

    methods: {

        ...mapActions({
            getUserCartItems: 'cart/getUserCartItems',
            addItemsToCart: 'cart/addItemsToCart'
        }),

        addMore(){
            this.items.push({...this.item})
        },
        removeItem(index){
            this.items.splice(index, 1)
        },

        addToCart(){

            this.addItemsToCart(this.items).then((data) => {
                this.notifSuceess('Item Added to cart successfully');
                $('#addToCart').modal('hide')
            }).catch((err) => {
                this.notifError( err.message || 'An error occurred')
            })

        }



    }
}
</script>

<style scoped>

div.sizes h6 {
    height: 42px !important;
}

.item-remove{
    cursor: pointer;
    font-size: 29px;
    font-weight: bolder;
}

.item-remove:hover{
    cursor: pointer;
    font-size: 31px;
    /*margin-top: 6px;*/
}

.modal{
    border-radius: 10px;
}

.no-gutters > div {
    margin-right: 1%;
}

.modal-footer {
    padding-right: 10px;
    padding-left: 10px;
}
.modal-body {
    padding-top: 20px;
    padding-left: 3px;
    padding-right: 3px;
}

.modal-header{
    border-bottom: 1px solid #eff2f7;

}

 .modal-footer {
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -ms-flex-wrap: wrap;
     flex-wrap: wrap;
     -webkit-box-align: center;
     -ms-flex-align: center;
     align-items: center;
     -webkit-box-pack: end;
     -ms-flex-pack: end;
     justify-content: flex-end;
     padding: 0.75rem;
     border-top: 1px solid #eff2f7;
     border-bottom-right-radius: calc(0.3rem - 1px);
     border-bottom-left-radius: calc(0.3rem - 1px);
 }
</style>
