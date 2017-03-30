require('./bootstrap');

Vue.component('trooplist', require('./components/Trooplist.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('playersadmin', require('./components/Admin/Players.vue'));
Vue.component('citiesside', require('./components/Cities.vue'));
const app = new Vue({
    el: '#app'
})