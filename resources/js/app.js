/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import store from './store.js';
import VueRouter from 'vue-router';
import routes from './routes.js';
import filters from './filters'; 
import VueSwal from 'vue-swal';
import VeeValidate from 'vee-validate';
//import Loading from 'vue-loading-overlay';
//import 'vue-loading-overlay/dist/vue-loading.css';
import VueXlsx from 'vue-js-xlsx'
    
window.Vue = require('vue');
//require('vue-axios-interceptors');

filters.forEach(f => {
   Vue.filter(f.name, f.execute)
})

Vue.use(VueSwal);
Vue.use(VeeValidate);
/*
Vue.use(Loading, {
	color: 'red',
});*/
//=========================vue router========================================
Vue.use(VueRouter)
const router = new VueRouter({
  routes: routes
})

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueXlsx)

import interceptorsSetup from './interceptors'
interceptorsSetup();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('loading-component', require('./components/Loading.vue').default);
Vue.component('posts', require('./components/home/Posts.vue').default);
Vue.component('pageHeader', require('./components/Header.vue').default);
Vue.component('userData', require('./components/Userdata.vue').default);
Vue.component('muridKelas', require('./components/MuridKelas.vue').default);
Vue.component('tagSec', require('./components/Tagsec.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	router,
	store,
    el: '#app',
    mounted(){
        if(this.$router.currentRoute.path != '/'){
        	axios.get(this.$store.state.apiUrl + 'usersession').then(response=>{
        		this.$store.state.session = response.data.user;
                this.$router.push('/profile');
        	}).catch(error=>{
            });
        }
        else{
            this.$store.state.session = {};
        }
    }
});
