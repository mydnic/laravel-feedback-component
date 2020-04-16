require('./bootstrap');

Vue.component('kustomer', require('./components/Kustomer.vue').default);

const app = new Vue({
    el: '#kustomer',
});
