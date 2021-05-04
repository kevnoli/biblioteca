import Vue from 'vue'

import auth from '@websanova/vue-auth/dist/v2/vue-auth.esm';
import Bearer from '@websanova/vue-auth/dist/drivers/auth/bearer.esm';
import Axios from '@websanova/vue-auth/dist/drivers/http/axios.1.x.esm';
import Router from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.esm';

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
    loginData: {
      url: '/auth/login',
      method: 'POST',
      redirect: '/',
      fetchUser: 'true'
  },

  logoutData: {
      url: 'auth/logout',
      method: 'POST',
      redirect: '/login',
      makeRequest: true
  },

  fetchData: {
      url: 'auth/usuario',
      method: 'POST',
      enabled: true
  },

  refreshData: {
      url: 'auth/refresh',
      method: 'POST',
      enabled: true,
      interval: 30
  }
  }
});