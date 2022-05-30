import Vue from 'vue';
import router from './router';
import App from './components/App';
import TailablePagination from 'tailable-pagination';

require('./bootstrap');

Vue.use(TailablePagination);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
