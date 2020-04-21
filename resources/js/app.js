import Vue from 'vue';
import App from './components/Vue/App.vue';
import router from './components/Vue/router.js';


new Vue({
  router, 
  render: h => h(App),
}).$mount('#app') 