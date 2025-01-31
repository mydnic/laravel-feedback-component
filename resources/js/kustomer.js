import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Kustomer from './components/Kustomer/Kustomer.vue';

const app = createApp({});
app.component('kustomer', Kustomer);
app.mount('#kustomer');
