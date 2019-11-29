// require('./bootstrap');

window.Vue = require('vue');

Vue.component('Matrimonio', require('./components/Matrimonio.vue').default);
Vue.component('Nacimiento', require('./components/Nacimiento2.vue').default);

const app =new Vue({
    el: '#app',
    data :{
        menu:0
    }
});