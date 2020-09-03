/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Codigo Js
require('./js');


window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

Vue.component('authorized', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('clients', require('./components/passport/Clients.vue').default);
Vue.component('personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);


Vue.component('images', require('./components/profiles/Images.vue').default);
Vue.component('general', require('./components/profiles/General.vue').default);
Vue.component('social', require('./components/profiles/Social.vue').default);
Vue.component('password', require('./components/profiles/Password.vue').default);
Vue.component('settings', require('./components/profiles/Settings.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#wrapper',
});
