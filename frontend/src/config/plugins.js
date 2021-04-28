import Vue from 'vue'

import auth from '@websanova/vue-auth/src/v2.js';
import Bearer from '@websanova/vue-auth/src/drivers/auth/bearer.js';
import Axios from '@websanova/vue-auth/src/drivers/http/axios.1.x.js';
import Router from '@websanova/vue-auth/src/drivers/router/vue-router.2.x.js';

Vue.use(auth, {
  plugins: {
    http: Vue.axios,
    router: Vue.router
  },
  drivers: {
    auth: Bearer,
    http: Axios,
    router: Router
  },
  options: {
    tokenDefaultKey: 'token',
    fetchData: {
      url: 'auth/usuario',
      method: 'GET',
      enabled: true
    }
  }
});