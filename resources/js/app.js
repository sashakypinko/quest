
require('./bootstrap');

window.Vue = require('vue');

import Toast from "vue-toastification";
import Notifications from 'vue-notification'

Vue.use(Notifications)

Vue.component('task', require('./components/Task.vue').default);
Vue.component('response-create', require('./components/ResponseCreate.vue').default);
Vue.component('quest', require('./components/Quest.vue').default);
Vue.component('google-map', require('./components/GoogleMap.vue').default);

const app = new Vue({
    el: '#app',
});
