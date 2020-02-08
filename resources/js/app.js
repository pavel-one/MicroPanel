require('./bootstrap');
window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);


const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const MicroPanel = new Vue({
    el: '#app',
    data: {
        config: configApp,
        UserPhoto: '',
    },
    mounted() {
        this.UserPhoto = this.getUrlRouteName('dashboard.user.getphoto', this.config.user.id);
    },
    methods: {
        setMessage: function (message = '', error = false) {
            this.$swal.fire({
                icon: error ? 'error' : 'success',
                title: error ? 'Ошибка' : 'Успех',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                text: message,
                showConfirmButton: false,
            })
        },
        alertDevelop: function () {
            this.$swal.fire({
                icon: 'error',
                title: 'Упс...',
                // toast: true,
                // position: 'top-end',
                // timer: 2000,
                // timerProgressBar: true,
                text: 'Функционал еще в разработке',
            })
        },
        getUrlRoute: function (route, id) {
            return '/' + route.replace(/{(.*)}/, id);
        },
        getUrlRouteName: function (route, id) {
            return '/' + this.config.routes[route].replace(/{(.*)}/, id);
        },
        updateConfig: function () {
            let url = '/' + this.config.routes['dashboard.user.config'];
            axios.get(url)
                .then((response) => {
                    this.config = response.data
                });
        },
    }
});

// helpers
