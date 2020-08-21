
require('./bootstrap');

window.Vue = require('vue');

import Toast from "vue-toastification";
import Notifications from 'vue-notification'

Vue.use(Notifications)

Vue.component('quest-page', require('./components/QuestPage.vue').default);
Vue.component('response-create', require('./components/ResponseCreate.vue').default);

const app = new Vue({
    el: '#app',
});
