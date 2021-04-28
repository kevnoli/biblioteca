import Vue from 'vue'
import App from './App.vue'

import http from './http'
import router from './router'
import vuetify from './plugins/vuetify'
import auth from './config'

import 'roboto-fontface/css/roboto/roboto-fontface.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.config.productionTip = false

new Vue({
  http: http,
  router: router,
  vuetify: vuetify,
  auth: auth,
  render: h => h(App)
}).$mount('#app')
