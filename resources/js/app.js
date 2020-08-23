require('./bootstrap');

window.Vue = require('vue');

import Notifications from 'vue-notification'
import velocity from 'velocity-animate'
import moment from 'moment';

import VueTimeago from 'vue-timeago'

Vue.use(VueTimeago, {
    name: 'Timeago',
    locale: 'ru',
    locales: {
        'ru': require('date-fns/locale/ru')
    }
});

Vue.prototype.$moment = moment;
Vue.prototype.$moment.locale('ru');

Vue.use(Notifications, {velocity});

Vue.component('task', require('./components/task/Task.vue').default);
Vue.component('response-create', require('./components/response/CreateResponse.vue').default);
Vue.component('response-show', require('./components/response/ShowResponses.vue').default);
Vue.component('quest', require('./components/quest/Quest.vue').default);
Vue.component('google-map', require('./components/GoogleMap.vue').default);
Vue.component('g-map', require('./components/Gmap.vue').default);
Vue.component('chat', require('./components/message/Chat').default);
Vue.component('chats', require('./components/message/Chats').default);

const app = new Vue({
    el: '#app',
});

