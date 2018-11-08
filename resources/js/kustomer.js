require('./bootstrap');

Vue.component('kustomer', require('./components/Kustomer.vue'));

const app = new Vue({
    el: '#kustomer',
});
