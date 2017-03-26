
require('./bootstrap');


Vue.component('trooplist', require('./components/trooplist.vue'));
Vue.component('example', require('./components/Example.vue'));
const app = new Vue({
    el: '#app'
})