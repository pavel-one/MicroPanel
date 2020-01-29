require('./bootstrap');
window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const MicroPanel = new Vue({
    el: '#app',
    data: {
        message: {
            error: false,
            text: '',
        },
    },
    methods: {
        setMessage: function (message = '', error = false) {
            this.message.text = message;
            this.message.error = error;
        }
    }
});
