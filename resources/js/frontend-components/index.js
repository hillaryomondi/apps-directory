import Vue from "vue"
Vue.component('login-component', () => import(/* webpackChunkName: `login-component` */ "./LoginComponent"))
Vue.component('home-component', () => import(/* webpackChunkName: `home-component` */ "./HomeComponent"))
Vue.component('search-component', () => import(/* webpackChunkName: `search-component` */ "./SearchComponent"))
