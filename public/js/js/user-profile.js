(self.webpackChunk=self.webpackChunk||[]).push([[915],{7757:(t,r,e)=>{t.exports=e(5666)},8766:(t,r,e)=>{"use strict";function n(t,r){if(!(t instanceof r))throw new TypeError("Cannot call a class as a function")}function s(t,r){for(var e=0;e<r.length;e++){var n=r[e];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}e.d(r,{Z:()=>o});const o=function(){function t(){var r=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};n(this,t),this.setErrors(r)}var r,e,o;return r=t,(e=[{key:"hasErrors",value:function(){return!!this.keys.length}},{key:"keys",get:function(){return Object.keys(this.errors)}},{key:"hasError",value:function(t){return this.keys.indexOf(t)>-1}},{key:"firstKey",value:function(){return this.keys[0]}},{key:"first",value:function(t){return this.errors[t]?this.errors[t][0]:void 0}},{key:"setErrors",value:function(t){this.errors=t}},{key:"clearAll",value:function(){this.setErrors({})}},{key:"clear",value:function(t){return delete this.errors[t]}}])&&s(r.prototype,e),o&&s(r,o),t}()},5666:t=>{var r=function(t){"use strict";var r,e=Object.prototype,n=e.hasOwnProperty,s="function"==typeof Symbol?Symbol:{},o=s.iterator||"@@iterator",a=s.asyncIterator||"@@asyncIterator",i=s.toStringTag||"@@toStringTag";function c(t,r,e){return Object.defineProperty(t,r,{value:e,enumerable:!0,configurable:!0,writable:!0}),t[r]}try{c({},"")}catch(t){c=function(t,r,e){return t[r]=e}}function u(t,r,e,n){var s=r&&r.prototype instanceof m?r:m,o=Object.create(s.prototype),a=new j(n||[]);return o._invoke=function(t,r,e){var n=f;return function(s,o){if(n===p)throw new Error("Generator is already running");if(n===h){if("throw"===s)throw o;return N()}for(e.method=s,e.arg=o;;){var a=e.delegate;if(a){var i=O(a,e);if(i){if(i===v)continue;return i}}if("next"===e.method)e.sent=e._sent=e.arg;else if("throw"===e.method){if(n===f)throw n=h,e.arg;e.dispatchException(e.arg)}else"return"===e.method&&e.abrupt("return",e.arg);n=p;var c=l(t,r,e);if("normal"===c.type){if(n=e.done?h:d,c.arg===v)continue;return{value:c.arg,done:e.done}}"throw"===c.type&&(n=h,e.method="throw",e.arg=c.arg)}}}(t,e,a),o}function l(t,r,e){try{return{type:"normal",arg:t.call(r,e)}}catch(t){return{type:"throw",arg:t}}}t.wrap=u;var f="suspendedStart",d="suspendedYield",p="executing",h="completed",v={};function m(){}function y(){}function g(){}var _={};_[o]=function(){return this};var w=Object.getPrototypeOf,b=w&&w(w(L([])));b&&b!==e&&n.call(b,o)&&(_=b);var C=g.prototype=m.prototype=Object.create(_);function E(t){["next","throw","return"].forEach((function(r){c(t,r,(function(t){return this._invoke(r,t)}))}))}function x(t,r){function e(s,o,a,i){var c=l(t[s],t,o);if("throw"!==c.type){var u=c.arg,f=u.value;return f&&"object"==typeof f&&n.call(f,"__await")?r.resolve(f.__await).then((function(t){e("next",t,a,i)}),(function(t){e("throw",t,a,i)})):r.resolve(f).then((function(t){u.value=t,a(u)}),(function(t){return e("throw",t,a,i)}))}i(c.arg)}var s;this._invoke=function(t,n){function o(){return new r((function(r,s){e(t,n,r,s)}))}return s=s?s.then(o,o):o()}}function O(t,e){var n=t.iterator[e.method];if(n===r){if(e.delegate=null,"throw"===e.method){if(t.iterator.return&&(e.method="return",e.arg=r,O(t,e),"throw"===e.method))return v;e.method="throw",e.arg=new TypeError("The iterator does not provide a 'throw' method")}return v}var s=l(n,t.iterator,e.arg);if("throw"===s.type)return e.method="throw",e.arg=s.arg,e.delegate=null,v;var o=s.arg;return o?o.done?(e[t.resultName]=o.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=r),e.delegate=null,v):o:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,v)}function k(t){var r={tryLoc:t[0]};1 in t&&(r.catchLoc=t[1]),2 in t&&(r.finallyLoc=t[2],r.afterLoc=t[3]),this.tryEntries.push(r)}function P(t){var r=t.completion||{};r.type="normal",delete r.arg,t.completion=r}function j(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(k,this),this.reset(!0)}function L(t){if(t){var e=t[o];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var s=-1,a=function e(){for(;++s<t.length;)if(n.call(t,s))return e.value=t[s],e.done=!1,e;return e.value=r,e.done=!0,e};return a.next=a}}return{next:N}}function N(){return{value:r,done:!0}}return y.prototype=C.constructor=g,g.constructor=y,y.displayName=c(g,i,"GeneratorFunction"),t.isGeneratorFunction=function(t){var r="function"==typeof t&&t.constructor;return!!r&&(r===y||"GeneratorFunction"===(r.displayName||r.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,g):(t.__proto__=g,c(t,i,"GeneratorFunction")),t.prototype=Object.create(C),t},t.awrap=function(t){return{__await:t}},E(x.prototype),x.prototype[a]=function(){return this},t.AsyncIterator=x,t.async=function(r,e,n,s,o){void 0===o&&(o=Promise);var a=new x(u(r,e,n,s),o);return t.isGeneratorFunction(e)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},E(C),c(C,i,"Generator"),C[o]=function(){return this},C.toString=function(){return"[object Generator]"},t.keys=function(t){var r=[];for(var e in t)r.push(e);return r.reverse(),function e(){for(;r.length;){var n=r.pop();if(n in t)return e.value=n,e.done=!1,e}return e.done=!0,e}},t.values=L,j.prototype={constructor:j,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=r,this.done=!1,this.delegate=null,this.method="next",this.arg=r,this.tryEntries.forEach(P),!t)for(var e in this)"t"===e.charAt(0)&&n.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=r)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function s(n,s){return i.type="throw",i.arg=t,e.next=n,s&&(e.method="next",e.arg=r),!!s}for(var o=this.tryEntries.length-1;o>=0;--o){var a=this.tryEntries[o],i=a.completion;if("root"===a.tryLoc)return s("end");if(a.tryLoc<=this.prev){var c=n.call(a,"catchLoc"),u=n.call(a,"finallyLoc");if(c&&u){if(this.prev<a.catchLoc)return s(a.catchLoc,!0);if(this.prev<a.finallyLoc)return s(a.finallyLoc)}else if(c){if(this.prev<a.catchLoc)return s(a.catchLoc,!0)}else{if(!u)throw new Error("try statement without catch or finally");if(this.prev<a.finallyLoc)return s(a.finallyLoc)}}}},abrupt:function(t,r){for(var e=this.tryEntries.length-1;e>=0;--e){var s=this.tryEntries[e];if(s.tryLoc<=this.prev&&n.call(s,"finallyLoc")&&this.prev<s.finallyLoc){var o=s;break}}o&&("break"===t||"continue"===t)&&o.tryLoc<=r&&r<=o.finallyLoc&&(o=null);var a=o?o.completion:{};return a.type=t,a.arg=r,o?(this.method="next",this.next=o.finallyLoc,v):this.complete(a)},complete:function(t,r){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&r&&(this.next=r),v},finish:function(t){for(var r=this.tryEntries.length-1;r>=0;--r){var e=this.tryEntries[r];if(e.finallyLoc===t)return this.complete(e.completion,e.afterLoc),P(e),v}},catch:function(t){for(var r=this.tryEntries.length-1;r>=0;--r){var e=this.tryEntries[r];if(e.tryLoc===t){var n=e.completion;if("throw"===n.type){var s=n.arg;P(e)}return s}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,n){return this.delegate={iterator:L(t),resultName:e,nextLoc:n},"next"===this.method&&(this.arg=r),v}},t}(t.exports);try{regeneratorRuntime=r}catch(t){Function("r","regeneratorRuntime = r")(r)}},8221:(t,r,e)=>{"use strict";e.d(r,{Z:()=>a});function n(t,r){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);r&&(n=n.filter((function(r){return Object.getOwnPropertyDescriptor(t,r).enumerable}))),e.push.apply(e,n)}return e}function s(t,r,e){return r in t?Object.defineProperty(t,r,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[r]=e,t}const o={name:"NavAccount",props:["raw_url","user"],data:function(){return{url:this.raw_url?JSON.parse(this.raw_url):null}},computed:function(t){for(var r=1;r<arguments.length;r++){var e=null!=arguments[r]?arguments[r]:{};r%2?n(Object(e),!0).forEach((function(r){s(t,r,e[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):n(Object(e)).forEach((function(r){Object.defineProperty(t,r,Object.getOwnPropertyDescriptor(e,r))}))}return t}({},(0,e(629).Se)({userWishlist:"account/userWishlist",userOrders:"account/userOrders"})),methods:{isActiveUrl:function(t){return this.url.base+t===this.url.current?"active":""}}};const a=(0,e(1900).Z)(o,(function(){var t=this,r=t.$createElement,e=t._self._c||r;return e("div",{staticClass:"col-lg-4"},[e("aside",{staticClass:"user-info-wrapper"},[e("div",{staticClass:"user-cover",staticStyle:{"background-image":"url(/img/account/user-cover-img.jpg)"}}),t._v(" "),e("div",{staticClass:"user-info"},[e("div",{staticClass:"user-data"},[e("h4",[t._v(t._s(t.user.name))]),e("span",[t._v("Joined "+t._s(t.user.formatted_date))])])])]),t._v(" "),e("nav",{staticClass:"list-group"},[e("a",{staticClass:"list-group-item with-badge",class:t.isActiveUrl("/account/orders"),attrs:{href:"/account/orders"}},[e("i",{staticClass:"icon-bag"}),t._v("Orders"),e("span",{staticClass:"badge badge-primary badge-pill"},[t._v(t._s(t.userOrders.length))])]),t._v(" "),e("a",{staticClass:"list-group-item",class:t.isActiveUrl("/account/profile"),attrs:{href:"/account/profile"}},[e("i",{staticClass:"icon-head"}),t._v("Profile\n            ")]),t._v(" "),e("a",{staticClass:"list-group-item",class:t.isActiveUrl("/account/address"),attrs:{href:"/account/address"}},[e("i",{staticClass:"icon-map"}),t._v("Delivery Address\n            ")]),t._v(" "),e("a",{staticClass:"list-group-item with-badge",class:t.isActiveUrl("/account/wishlist"),attrs:{href:"/account/wishlist"}},[e("i",{staticClass:"icon-heart"}),t._v("Wishlist"),e("span",{staticClass:"badge badge-primary badge-pill"},[t._v(t._s(t.userWishlist.length))])])])])}),[],!1,null,"5422c93a",null).exports},9991:(t,r,e)=>{"use strict";e.r(r),e.d(r,{default:()=>f});var n=e(7757),s=e.n(n),o=e(8221),a=e(8766),i=e(3590);function c(t,r,e,n,s,o,a){try{var i=t[o](a),c=i.value}catch(t){return void e(t)}i.done?r(c):Promise.resolve(c).then(n,s)}var u=function t(r){!function(t,r){if(!(t instanceof r))throw new TypeError("Cannot call a class as a function")}(this,t),this.name=r.name||"",this.phone=r.phone||"",this.email=r.email||"",this.password=r.password||"",this.password_confirmation=r.password_confirmation||""};const l={name:"UserProfile",props:["raw_user","raw_url"],components:{NavAccount:o.Z,Spinner:i.Z},data:function(){return{user:null,errors:new a.Z,disabled:!1,loaded:!1}},mounted:function(){var t=JSON.parse(this.raw_user);this.user=new u(t),this.loaded=!0},methods:{updateProfile:function(){var t=this;this.disabled=!0,this.$http.put("/account/profile",this.user).then(function(){var r,e=(r=s().mark((function r(e){return s().wrap((function(r){for(;;)switch(r.prev=r.next){case 0:t.notifSuceess("Profile updated successfully"),t.disabled=!1;case 2:case"end":return r.stop()}}),r)})),function(){var t=this,e=arguments;return new Promise((function(n,s){var o=r.apply(t,e);function a(t){c(o,n,s,a,i,"next",t)}function i(t){c(o,n,s,a,i,"throw",t)}a(void 0)}))});return function(t){return e.apply(this,arguments)}}()).catch((function(r){if(r.response&&422===r.response.status){var e=r.response.data.errors;t.errors.setErrors(e)}t.notifError(r.message||"An error occurred"),t.disabled=!1}))}}};const f=(0,e(1900).Z)(l,(function(){var t=this,r=t.$createElement,e=t._self._c||r;return e("div",{staticClass:"container padding-bottom-3x mb-2"},[t.loaded?e("div",{staticClass:"row"},[t.user?e("nav-account",{attrs:{raw_url:t.raw_url,user:t.user}}):t._e(),t._v(" "),e("div",{staticClass:"col-lg-8"},[e("h4",{staticClass:"mt-3"},[t._v("Profile")]),t._v(" "),e("hr",{staticClass:"mb-4"}),t._v(" "),t.user?e("form",{staticClass:"row",on:{submit:function(r){return r.preventDefault(),t.updateProfile(r)}}},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"form-group"},[e("label",{attrs:{for:"account-fn"}},[t._v("Name")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.user.name,expression:"user.name"}],staticClass:"form-control",class:{"is-invalid":t.errors.hasError("name")},attrs:{required:"",type:"text",id:"account-fn",value:"Daniel"},domProps:{value:t.user.name},on:{input:function(r){r.target.composing||t.$set(t.user,"name",r.target.value)}}}),t._v(" "),t.errors.hasError("name")?e("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.errors.first("name")))]):t._e()])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"form-group"},[e("label",{attrs:{for:"account-email"}},[t._v("E-mail Address")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.user.email,expression:"user.email"}],staticClass:"form-control",class:{"is-invalid":t.errors.hasError("email")},attrs:{required:"",type:"email",id:"account-email",value:"daniel.adams@mail.com",disabled:""},domProps:{value:t.user.email},on:{input:function(r){r.target.composing||t.$set(t.user,"email",r.target.value)}}}),t._v(" "),t.errors.hasError("email")?e("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.errors.first("email")))]):t._e()])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"form-group"},[e("label",{attrs:{for:"account-phone"}},[t._v("Phone Number")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.user.phone,expression:"user.phone"}],staticClass:"form-control",class:{"is-invalid":t.errors.hasError("phone")},attrs:{required:"",type:"text",id:"account-phone",value:"+7(805) 348 95 72"},domProps:{value:t.user.phone},on:{input:function(r){r.target.composing||t.$set(t.user,"phone",r.target.value)}}}),t._v(" "),t.errors.hasError("phone")?e("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.errors.first("phone")))]):t._e()])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"form-group"},[e("label",{attrs:{for:"account-pass"}},[t._v("New Password")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.user.password,expression:"user.password"}],staticClass:"form-control",class:{"is-invalid":t.errors.hasError("password")},attrs:{type:"password",id:"account-pass"},domProps:{value:t.user.password},on:{input:function(r){r.target.composing||t.$set(t.user,"password",r.target.value)}}}),t._v(" "),t.errors.hasError("password")?e("div",{staticClass:"invalid invalid-tooltip"},[t._v(t._s(t.errors.first("password")))]):t._e()])]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("div",{staticClass:"form-group"},[e("label",{attrs:{for:"account-confirm-pass"}},[t._v("Confirm Password")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.user.password_confirmation,expression:"user.password_confirmation"}],staticClass:"form-control",attrs:{type:"password",id:"account-confirm-pass"},domProps:{value:t.user.password_confirmation},on:{input:function(r){r.target.composing||t.$set(t.user,"password_confirmation",r.target.value)}}}),t._v(" "),t.errors.hasError("password_confirmation")?e("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.errors.first("password_confirmation")))]):t._e()])]),t._v(" "),e("div",{staticClass:"col-12"},[e("div",{staticClass:"d-flex flex-wrap justify-content-between align-items-center"},[e("div",{staticClass:"custom-control custom-checkbox d-block"}),t._v(" "),e("button",{staticClass:"btn btn-primary margin-right-none",attrs:{type:"submit"}},[t._v("\n                                Update Profile\n                                "),t.disabled?e("i",{staticClass:"fa fa-spinner fa-pulse"}):t._e()])])])]):t._e()])],1):e("spinner")],1)}),[],!1,null,"669fabad",null).exports},3590:(t,r,e)=>{"use strict";e.d(r,{Z:()=>s});const n={name:"Spinner"};const s=(0,e(1900).Z)(n,(function(){var t=this,r=t.$createElement;t._self._c;return t._m(0)}),[function(){var t=this.$createElement,r=this._self._c||t;return r("div",{staticClass:"text-center mx-auto"},[r("i",{staticClass:"fas  fa-2x fa-spinner fa-pulse"})])}],!1,null,"2a721016",null).exports},1900:(t,r,e)=>{"use strict";function n(t,r,e,n,s,o,a,i){var c,u="function"==typeof t?t.options:t;if(r&&(u.render=r,u.staticRenderFns=e,u._compiled=!0),n&&(u.functional=!0),o&&(u._scopeId="data-v-"+o),a?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),s&&s.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},u._ssrRegister=c):s&&(c=i?function(){s.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:s),c)if(u.functional){u._injectStyles=c;var l=u.render;u.render=function(t,r){return c.call(r),l(t,r)}}else{var f=u.beforeCreate;u.beforeCreate=f?[].concat(f,c):[c]}return{exports:t,options:u}}e.d(r,{Z:()=>n})}}]);