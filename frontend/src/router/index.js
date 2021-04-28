import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../views/Home.vue";
import Login from "../views/Login.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: {
      auth: true
    } 
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: {
      auth: false
    }
  }
];

Vue.router = new VueRouter({
  mode: "history",
  base: "localhost:8080",
  routes
});

export default Vue.router;
