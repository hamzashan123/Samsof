require('./bootstrap');
require('./fontawesome');

import Buefy from "buefy";

window.Vue = require('vue');

Vue.use(Buefy);

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.mixin({
    methods: {
        route: route,
        scrollTo(element) {
            document.documentElement.scrollTop = document.querySelector(element).offsetTop - 0;
        }
    }
});

const app = new Vue({
    el: '#app',
});
