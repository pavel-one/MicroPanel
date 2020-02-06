window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    require('jquery');
    require('bootstrap');
    // TODO: Feature
    // require('/public/template/assets/js/plugins/chart.js/dist/Chart.min.js');
    // require('/public/template/assets/js/plugins/chart.js/dist/Chart.extension');
    require('./argon-dashboard');
    require('vue-notification');
} catch (e) {
}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
