(self.webpackChunk=self.webpackChunk||[]).push([[601],{7757:(t,e,r)=>{t.exports=r(5666)},7429:(t,e,r)=>{"use strict";r.d(e,{Z:()=>a});var o=r(3645),n=r.n(o)()((function(t){return t[1]}));n.push([t.id,".widget-img[data-v-58a2c64f]{width:50px;height:50px}.entry-meta[data-v-58a2c64f],h4[data-v-58a2c64f]{margin-left:7px!important}",""]);const a=n},5666:t=>{var e=function(t){"use strict";var e,r=Object.prototype,o=r.hasOwnProperty,n="function"==typeof Symbol?Symbol:{},a=n.iterator||"@@iterator",i=n.asyncIterator||"@@asyncIterator",s=n.toStringTag||"@@toStringTag";function c(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{c({},"")}catch(t){c=function(t,e,r){return t[e]=r}}function u(t,e,r,o){var n=e&&e.prototype instanceof m?e:m,a=Object.create(n.prototype),i=new O(o||[]);return a._invoke=function(t,e,r){var o=d;return function(n,a){if(o===p)throw new Error("Generator is already running");if(o===h){if("throw"===n)throw a;return F()}for(r.method=n,r.arg=a;;){var i=r.delegate;if(i){var s=P(i,r);if(s){if(s===v)continue;return s}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if(o===d)throw o=h,r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);o=p;var c=l(t,e,r);if("normal"===c.type){if(o=r.done?h:f,c.arg===v)continue;return{value:c.arg,done:r.done}}"throw"===c.type&&(o=h,r.method="throw",r.arg=c.arg)}}}(t,r,i),a}function l(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}t.wrap=u;var d="suspendedStart",f="suspendedYield",p="executing",h="completed",v={};function m(){}function g(){}function y(){}var _={};_[a]=function(){return this};var w=Object.getPrototypeOf,C=w&&w(w(L([])));C&&C!==r&&o.call(C,a)&&(_=C);var b=y.prototype=m.prototype=Object.create(_);function x(t){["next","throw","return"].forEach((function(e){c(t,e,(function(t){return this._invoke(e,t)}))}))}function k(t,e){function r(n,a,i,s){var c=l(t[n],t,a);if("throw"!==c.type){var u=c.arg,d=u.value;return d&&"object"==typeof d&&o.call(d,"__await")?e.resolve(d.__await).then((function(t){r("next",t,i,s)}),(function(t){r("throw",t,i,s)})):e.resolve(d).then((function(t){u.value=t,i(u)}),(function(t){return r("throw",t,i,s)}))}s(c.arg)}var n;this._invoke=function(t,o){function a(){return new e((function(e,n){r(t,o,e,n)}))}return n=n?n.then(a,a):a()}}function P(t,r){var o=t.iterator[r.method];if(o===e){if(r.delegate=null,"throw"===r.method){if(t.iterator.return&&(r.method="return",r.arg=e,P(t,r),"throw"===r.method))return v;r.method="throw",r.arg=new TypeError("The iterator does not provide a 'throw' method")}return v}var n=l(o,t.iterator,r.arg);if("throw"===n.type)return r.method="throw",r.arg=n.arg,r.delegate=null,v;var a=n.arg;return a?a.done?(r[t.resultName]=a.value,r.next=t.nextLoc,"return"!==r.method&&(r.method="next",r.arg=e),r.delegate=null,v):a:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,v)}function E(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function N(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function O(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(E,this),this.reset(!0)}function L(t){if(t){var r=t[a];if(r)return r.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var n=-1,i=function r(){for(;++n<t.length;)if(o.call(t,n))return r.value=t[n],r.done=!1,r;return r.value=e,r.done=!0,r};return i.next=i}}return{next:F}}function F(){return{value:e,done:!0}}return g.prototype=b.constructor=y,y.constructor=g,g.displayName=c(y,s,"GeneratorFunction"),t.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===g||"GeneratorFunction"===(e.displayName||e.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,y):(t.__proto__=y,c(t,s,"GeneratorFunction")),t.prototype=Object.create(b),t},t.awrap=function(t){return{__await:t}},x(k.prototype),k.prototype[i]=function(){return this},t.AsyncIterator=k,t.async=function(e,r,o,n,a){void 0===a&&(a=Promise);var i=new k(u(e,r,o,n),a);return t.isGeneratorFunction(r)?i:i.next().then((function(t){return t.done?t.value:i.next()}))},x(b),c(b,s,"Generator"),b[a]=function(){return this},b.toString=function(){return"[object Generator]"},t.keys=function(t){var e=[];for(var r in t)e.push(r);return e.reverse(),function r(){for(;e.length;){var o=e.pop();if(o in t)return r.value=o,r.done=!1,r}return r.done=!0,r}},t.values=L,O.prototype={constructor:O,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=e,this.done=!1,this.delegate=null,this.method="next",this.arg=e,this.tryEntries.forEach(N),!t)for(var r in this)"t"===r.charAt(0)&&o.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=e)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var r=this;function n(o,n){return s.type="throw",s.arg=t,r.next=o,n&&(r.method="next",r.arg=e),!!n}for(var a=this.tryEntries.length-1;a>=0;--a){var i=this.tryEntries[a],s=i.completion;if("root"===i.tryLoc)return n("end");if(i.tryLoc<=this.prev){var c=o.call(i,"catchLoc"),u=o.call(i,"finallyLoc");if(c&&u){if(this.prev<i.catchLoc)return n(i.catchLoc,!0);if(this.prev<i.finallyLoc)return n(i.finallyLoc)}else if(c){if(this.prev<i.catchLoc)return n(i.catchLoc,!0)}else{if(!u)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return n(i.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var n=this.tryEntries[r];if(n.tryLoc<=this.prev&&o.call(n,"finallyLoc")&&this.prev<n.finallyLoc){var a=n;break}}a&&("break"===t||"continue"===t)&&a.tryLoc<=e&&e<=a.finallyLoc&&(a=null);var i=a?a.completion:{};return i.type=t,i.arg=e,a?(this.method="next",this.next=a.finallyLoc,v):this.complete(i)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),v},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),N(r),v}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var o=r.completion;if("throw"===o.type){var n=o.arg;N(r)}return n}}throw new Error("illegal catch attempt")},delegateYield:function(t,r,o){return this.delegate={iterator:L(t),resultName:r,nextLoc:o},"next"===this.method&&(this.arg=e),v}},t}(t.exports);try{regeneratorRuntime=e}catch(t){Function("r","regeneratorRuntime = r")(e)}},4469:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>y});var o=r(7757),n=r.n(o),a=r(629);const i=r(538).default.extend({name:"Paystack",props:["amount","user","paystack_pk"],methods:{makePayment:function(){var t=this;PaystackPop.setup({key:this.paystack_pk,email:this.user?this.user.email:"",amount:100*this.amount,currency:"NGN",reference:"REF-"+Date.now(),firstName:this.user?this.user.name:"",callback:function(e){"success"===e.status?t.$emit("payment-successful",e):t.$emit("payment-failed",e)},onError:function(e){t.$emit("go-back",null)},onClose:function(){t.$emit("go-back",null)}}).openIframe()},pressed:function(t){this.selectedPackageIndex=t}}});var s=r(1900);const c=(0,s.Z)(i,(function(){var t=this.$createElement;return(this._self._c||t)("div",{staticClass:"payment"})}),[],!1,null,"3190ef0e",null).exports;var u=r(5100),l=(r(9297),r(3590));function d(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,o)}return r}function f(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?d(Object(r),!0).forEach((function(e){p(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):d(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function p(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function h(t,e,r,o,n,a,i){try{var s=t[a](i),c=s.value}catch(t){return void r(t)}s.done?e(c):Promise.resolve(c).then(o,n)}function v(t){return function(){var e=this,r=arguments;return new Promise((function(o,n){var a=t.apply(e,r);function i(t){h(a,o,n,i,s,"next",t)}function s(t){h(a,o,n,i,s,"throw",t)}i(void 0)}))}}var m=function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.name=e.name||"",this.email=e.email||"",this.phone=e.phone||"",this.country=e.country||"Nigeria",this.state=e.state||"",this.lga=e.lga||"",this.address=e.address||""};const g={name:"Checkout",props:["raw_user","paystack_pk"],components:{Paystack:c,Spinner:l.Z,ProductWidget:u.Z},data:function(){return{user:this.raw_user?JSON.parse(this.raw_user):null,order:new m({}),state:"",lga:"",LGA:[],countries:[],loaded:!1}},mounted:function(){var t=this;return v(n().mark((function e(){var r,o,a;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,t.getNigerianStates({});case 2:return e.next=4,t.setDeliveryFee(0);case 4:return e.next=6,t.setTotalFee(t.subTotalAmount-t.couponDiscount);case 6:return e.next=8,t.getConfig({});case 8:t.countries.unshift("Nigeria"),t.config.foreign_countries.forEach((function(e){t.countries.push(e.country)})),t.user&&(r=t.user,o=t.user&&t.user.address,Object.assign(t.order,f(f({},r),o)),t.user.address&&(a=t.states.find((function(e){return e.name===t.user.address.state})),t.state=a,"Nigeria"===t.user.address.country&&(t.LGA=a.locals),t.order.lga=t.user.address.lga)),t.loaded=!0,t.getTopSellingProducts({num:4});case 13:case"end":return e.stop()}}),e)})))()},watch:{state:function(t){t&&t.name&&t.locals&&(this.order.state=t.name,this.LGA=t.locals),this.setDeliveryAmount()},"order.country":function(){this.order.state="",this.order.lga="",this.LGA=[]}},computed:f(f({},(0,a.Se)({cartItems:"cart/items",subTotalAmount:"cart/subTotalAmount",totalFee:"cart/totalFee",validCoupon:"cart/validCoupon",couponDiscount:"cart/couponDiscount",deliveryFee:"cart/deliveryFee",payBeforePercentage:"cart/payBeforePercentage",states:"locality/states",topSellingProducts:"shop/topSellingProducts",totalQty:"cart/totalQty",config:"config/config"})),{},{isCart:function(){return this.cartItems.length>0},isNigeria:function(){return!this.order.country||this.order.country&&"Nigeria"===this.order.country},minAmountToPay:function(){return Math.round(this.payBeforePercentage/100*this.totalFee)},isOrderFilled:function(){return!!(this.order.name&&this.order.email&&this.order.phone&&this.order.lga&&this.order.country&&this.order.state&&this.order.address)}}),methods:f(f(f({},(0,a.nv)({couponValidate:"cart/couponValidate",getNigerianStates:"locality/getNigerianStates",resetAllShoppingMutations:"cart/resetAllShoppingMutations",getTopSellingProducts:"shop/getTopSellingProducts",getConfig:"config/getConfig"})),(0,a.OI)({setTotalFee:"cart/setTotalFee",setDeliveryFee:"cart/setDeliveryFee",setValidCoupon:"cart/setValidCoupon",setCouponDiscount:"cart/setCouponDiscount"})),{},{initiateCheckout:function(){var t=this;return v(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!t.validCoupon||!t.validCoupon.id){e.next=6;break}return e.next=3,t.validateCoupon();case 3:if(e.sent){e.next=6;break}return e.abrupt("return");case 6:t.$refs.paystackPayment.makePayment();case 7:case"end":return e.stop()}}),e)})))()},completeOrder:function(t){var e=this;$("body").addClass("no-click"),this.$swal({buttons:!1,closeOnClickOutside:!1,allowOutsideClick:!1,text:"Pls wait while the order is been initiated.."}),this.$http.post("/orders/create",{order:f(f({},this.order),{},{ref:t.reference,sub_total_amount:this.subTotalAmount,total_amount:this.totalFee,delivery_fee:this.deliveryFee,number_of_items:this.totalQty,coupon_discount:this.couponDiscount,coupon_id:this.validCoupon?this.validCoupon.id:null}),items:this.cartItems}).then(function(){var t=v(n().mark((function t(r){return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return $("body").removeClass("no-click"),t.next=3,e.resetAllShoppingMutations();case 3:e.user?window.location="/account/orders":window.location="/shop";case 4:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}()).catch((function(t){$("body").removeClass("no-click"),e.$swal({text:"An error occurred while trying to complete your order! Pls contact us if you have been charged",dangerMode:!0})}))},paymentFailed:function(t){console.log(t),this.notifError(t&&t.message||"An error occurred while trying to process your payment")},goBack:function(){},setDeliveryAmount:function(){var t=this;if(this.config.delivery_free||this.subTotalAmount>=this.config.min_amount_free_delivery)this.setDeliveryFee(0);else{"Nigeria"!==this.order.country&&this.config.foreign_countries.forEach((function(e){t.order.country===e.country&&t.setDeliveryFee(parseInt(e.amount))})),"Nigeria"===this.order.country&&"Lagos"!==this.order.state&&this.setDeliveryFee(this.config.flat_outside_lagos_delivery_fee);var e=this.config.farther_lagos_lg;"Lagos"===this.order.state&&-1!==e.indexOf(this.order.lga)&&this.setDeliveryFee(this.config.flat_farther_lagos_delivery_fee),"Lagos"===this.order.state&&-1===e.indexOf(this.order.lga)&&this.setDeliveryFee(this.config.flat_lagos_delivery_fee)}this.setTotalFee(this.subTotalAmount+this.deliveryFee-this.couponDiscount)},validateCoupon:function(){var t=this;return v(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.abrupt("return",t.couponValidate({code:t.validCoupon.code,total_amount:t.subTotalAmount}).then((function(e){var r=!0;return t.coupon_data=e.coupon_data,e.coupon_data.valid||(t.notifError(e.coupon_data.message),t.setTotalFee(t.subTotalAmount+t.deliveryFee),t.setValidCoupon(null),t.setCouponDiscount(0),r=!1),r})).catch((function(e){t.notifError(e.message||"An error occurred")})));case 1:case"end":return e.stop()}}),e)})))()}})};const y=(0,s.Z)(g,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"container padding-bottom-3x mb-2"},[t.loaded?t._e():r("spinner"),t._v(" "),t.config&&t.loaded?r("div",{staticClass:"row"},[r("div",{staticClass:"col-xl-9 col-lg-8"},[t.isCart?r("form",{on:{submit:function(e){return e.preventDefault(),t.initiateCheckout(e)}}},[r("h4",[t._v("Shipping Information")]),t._v(" "),r("hr",{staticClass:"padding-bottom-1x"}),t._v(" "),r("div",{staticClass:"row"},[r("div",{staticClass:"col-sm-6"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-fn"}},[t._v("Name")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.name,expression:"order.name"}],staticClass:"form-control",attrs:{required:"",type:"text",id:"checkout-fn"},domProps:{value:t.order.name},on:{input:function(e){e.target.composing||t.$set(t.order,"name",e.target.value)}}})])]),t._v(" "),r("div",{staticClass:"col-sm-6"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-email"}},[t._v("E-mail Address")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.email,expression:"order.email"}],staticClass:"form-control",attrs:{required:"",type:"email",id:"checkout-email"},domProps:{value:t.order.email},on:{input:function(e){e.target.composing||t.$set(t.order,"email",e.target.value)}}})])])]),t._v(" "),r("div",{staticClass:"row"},[r("div",{staticClass:"col-sm-6"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-phone"}},[t._v("Phone Number")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.phone,expression:"order.phone"}],staticClass:"form-control",attrs:{required:"",type:"text",id:"checkout-phone"},domProps:{value:t.order.phone},on:{input:function(e){e.target.composing||t.$set(t.order,"phone",e.target.value)}}})])]),t._v(" "),r("div",{staticClass:"col-sm-6"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-country"}},[t._v("Country")]),t._v(" "),1===t.countries.length?r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.country,expression:"order.country"}],staticClass:"form-control",attrs:{type:"text",disabled:""},domProps:{value:t.order.country},on:{input:function(e){e.target.composing||t.$set(t.order,"country",e.target.value)}}}):r("select",{directives:[{name:"model",rawName:"v-model",value:t.order.country,expression:"order.country"}],staticClass:"form-control",attrs:{required:"",id:"checkout-country"},on:{change:[function(e){var r=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.order,"country",e.target.multiple?r:r[0])},t.setDeliveryAmount]}},[r("option",{attrs:{value:""}},[t._v("Select country")]),t._v(" "),t._l(t.countries,(function(e){return r("option",{domProps:{value:e}},[t._v(t._s(e))])}))],2)])])]),t._v(" "),r("div",{staticClass:"row"},[r("div",{staticClass:"col-sm-6"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-city"}},[t._v("State")]),t._v(" "),t.isNigeria?r("select",{directives:[{name:"model",rawName:"v-model",value:t.state,expression:"state"}],staticClass:"form-control",attrs:{required:"",id:"checkout-city"},on:{change:function(e){var r=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.state=e.target.multiple?r:r[0]}}},[r("option",{attrs:{value:""}},[t._v("Select State")]),t._v(" "),t._l(t.states,(function(e){return r("option",{domProps:{value:e}},[t._v(t._s(e.name))])}))],2):r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.state,expression:"order.state"}],staticClass:"form-control",attrs:{required:"",type:"text"},domProps:{value:t.order.state},on:{input:function(e){e.target.composing||t.$set(t.order,"state",e.target.value)}}})])]),t._v(" "),r("div",{staticClass:"col-sm-6"},[t.isNigeria?r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-lg"}},[t._v("Local Government")]),t._v(" "),r("select",{directives:[{name:"model",rawName:"v-model",value:t.order.lga,expression:"order.lga"}],staticClass:"form-control",attrs:{required:"",id:"checkout-lg"},on:{change:[function(e){var r=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.order,"lga",e.target.multiple?r:r[0])},t.setDeliveryAmount]}},[r("option",{attrs:{value:""}},[t._v("Select LGA")]),t._v(" "),t._l(t.LGA,(function(e){return r("option",{directives:[{name:"show",rawName:"v-show",value:t.LGA.length>0,expression:"LGA.length > 0"}],domProps:{value:e.name}},[t._v(t._s(e.name))])}))],2)]):r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-lg"}},[t._v("City")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.lga,expression:"order.lga"}],staticClass:"form-control",attrs:{required:"",type:"text"},domProps:{value:t.order.lga},on:{input:function(e){e.target.composing||t.$set(t.order,"lga",e.target.value)}}})])])]),t._v(" "),r("div",{staticClass:"row padding-bottom-1x"},[r("div",{staticClass:"col-sm-12"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"checkout-address1"}},[t._v("Address")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:t.order.address,expression:"order.address"}],staticClass:"form-control",attrs:{required:"",type:"text",id:"checkout-address1"},domProps:{value:t.order.address},on:{input:function(e){e.target.composing||t.$set(t.order,"address",e.target.value)}}})])])]),t._v(" "),t._m(0)]):r("p",{staticClass:"f-17"},[t._v("No items in your cart. Go to the "),r("a",{attrs:{href:"/shop"}},[t._v("shop")]),t._v(" to add items to the cart.")])]),t._v(" "),r("div",{staticClass:"col-xl-3 col-lg-4"},[r("aside",{staticClass:"sidebar"},[r("div",{staticClass:"padding-top-2x hidden-lg-up"}),t._v(" "),t.isCart?r("section",{staticClass:"widget widget-order-summary"},[r("h3",{staticClass:"widget-title"},[t._v("Order Summary")]),t._v(" "),r("table",{staticClass:"table"},[r("tr",[r("td",[t._v("Cart Subtotal:")]),t._v(" "),r("td",{staticClass:"text-medium"},[t._v("N"+t._s(t._f("formatMoney")(t.subTotalAmount)))])]),t._v(" "),r("tr",[r("td",[t._v("Delivery Fee:")]),t._v(" "),t.deliveryFee?r("td",{staticClass:"text-small"},[t._v("N"+t._s(t._f("formatMoney")(t.deliveryFee)))]):t.config.delivery_free?r("td",{staticClass:"text-small"},[t._v("Free")]):r("td",{staticClass:"text-small"},[t._v("To be Calculated")])]),t._v(" "),t.validCoupon?r("tr",[r("td",[t._v("Discount:")]),t._v(" "),r("td",{staticClass:"text-small text-danger"},[t._v(" - N"+t._s(t._f("formatMoney")(t.couponDiscount)))])]):t._e(),t._v(" "),r("tr",[r("td"),t._v(" "),r("td",{staticClass:"text-lg text-medium"},[t._v("N"+t._s(t._f("formatMoney")(t.totalFee)))])])])]):t._e(),t._v(" "),r("product-widget",{attrs:{title:"TOP SELLERS",products:t.topSellingProducts}})],1)])]):t._e(),t._v(" "),r("paystack",{ref:"paystackPayment",attrs:{user:t.order,id:"paystack",amount:t.totalFee,paystack_pk:t.paystack_pk},on:{"payment-successful":t.completeOrder,"go-back":t.goBack,"payment-failed":t.paymentFailed}})],1)}),[function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"checkout-footer"},[r("div",{staticClass:"column"},[r("a",{staticClass:"btn btn-outline-secondary",attrs:{href:"/cart"}},[r("i",{staticClass:"icon-arrow-left"}),r("span",{staticClass:"hidden-xs-down"},[t._v(" Back To Cart")])])]),t._v(" "),r("div",{staticClass:"column"},[r("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[r("span",{},[t._v("Pay ")]),t._v(" "),r("i",{staticClass:"icon-arrow-right"})])])])}],!1,null,"2ab6a84b",null).exports},5100:(t,e,r)=>{"use strict";r.d(e,{Z:()=>c});const o={name:"ProductWidget",props:["title","products","num"]};var n=r(3379),a=r.n(n),i=r(7429),s={insert:"head",singleton:!1};a()(i.Z,s);i.Z.locals;const c=(0,r(1900).Z)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return t.products&&t.products.length?r("div",{staticClass:"widget widget-featured-products"},[r("h3",{staticClass:"widget-title"},[t._v(t._s(t.title))]),t._v(" "),t._l(t.products,(function(e,o){return!t.num||t.num>o?r("div",{staticClass:"entry"},[r("div",{staticClass:"entry-thumb"},[r("a",{attrs:{href:"/product/"+e.slug}},[r("img",{staticClass:"widget-img",attrs:{src:e.front_image,alt:e.name}})])]),t._v(" "),r("div",{staticClass:"entry-content content"},[r("h4",{staticClass:"entry-title"},[r("a",{attrs:{href:"/product/"+e.slug}},[t._v(t._s(e.name))])]),r("span",{staticClass:"entry-meta"},[t._v("N"+t._s(t._f("formatMoney")(e.price)))])])]):t._e()}))],2):t._e()}),[],!1,null,"58a2c64f",null).exports},3590:(t,e,r)=>{"use strict";r.d(e,{Z:()=>n});const o={name:"Spinner"};const n=(0,r(1900).Z)(o,(function(){var t=this,e=t.$createElement;t._self._c;return t._m(0)}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"text-center mx-auto"},[e("i",{staticClass:"fas  fa-2x fa-spinner fa-pulse"})])}],!1,null,"2a721016",null).exports},1900:(t,e,r)=>{"use strict";function o(t,e,r,o,n,a,i,s){var c,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=r,u._compiled=!0),o&&(u.functional=!0),a&&(u._scopeId="data-v-"+a),i?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(i)},u._ssrRegister=c):n&&(c=s?function(){n.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:n),c)if(u.functional){u._injectStyles=c;var l=u.render;u.render=function(t,e){return c.call(e),l(t,e)}}else{var d=u.beforeCreate;u.beforeCreate=d?[].concat(d,c):[c]}return{exports:t,options:u}}r.d(e,{Z:()=>o})}}]);