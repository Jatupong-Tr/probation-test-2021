require('./bootstrap');

window.Vue = require('vue').default
Vue.component('transaction-page', require('./components/Q1/TransactionPage').default)

const app = new Vue({

}).$mount('#app');