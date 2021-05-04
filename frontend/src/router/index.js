import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../views/Home.vue";
import Login from "../views/Login.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
    meta: {
      auth: true
    } 
  },
  {
    path: "/login",
    name: "login",
    component: Login,
    meta: {
      auth: false
    }
  }
];

Vue.router = new VueRouter({
  mode: "history",
  routes
});

export default Vue.router;
