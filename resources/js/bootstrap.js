window._ = require('lodash');
window.Vue = require('vue');

// Setup AXIOS
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Inject CSS
var link = document.createElement('link');
link.rel = 'stylesheet';
link.href = '/vendor/kustomer/css/kustomer.css';
document.head.appendChild(link);
