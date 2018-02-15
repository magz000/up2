require('./bootstrap');

import Vue from 'vue';


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

Vue.component('paginate', require('vuejs-paginate'));

Vue.component('passport-clients',require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));


new Vue({
    el: '#app'
});


import App from './App.vue';
import Home from './components/Home.vue';
import Mentors from './components/Mentors.vue';
import ShowMentor from './components/ShowMentor.vue';
import Ideator from './components/Ideator.vue';
import ShowIdeator from './components/ShowIdeator.vue';
import CreateMentor from './components/mentor/CreateMentor.vue';
import CreateProject from './components/projects/CreateProject.vue';

import Test from './components/Test.vue';

const routes = [
    { name: 'Home', path: '/', component: Home },

    { name: 'Mentors',path: '/page/mentor', component: Mentors },
    { name: 'CreateMentor', path: '/page/mentor/create', component: CreateMentor },
    { name: 'ShowMentor', path: '/page/mentor/:id', component: ShowMentor },
    { name: 'CreateProject', path: '/page/mentor/:id/createproject', component: CreateProject },

    { name: 'Ideator', path: '/page/ideator', component: Ideator },

    { name: 'ShowIdeator', path: '/page/ideator/:id', component: ShowIdeator },


    { name: 'Test', path: '/test', component: Test },
];


const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');

