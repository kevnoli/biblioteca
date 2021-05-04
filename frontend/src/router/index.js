import Vue from "vue";
import VueRouter from "vue-router";

import Consultas from "../views/Consultas.vue";
import Login from "../views/Login.vue";

const Acervo = () =>  import(/* webpackChunkName: "Gerencial" */ "../views/Acervo.vue");
const Autores = () =>  import(/* webpackChunkName: "Gerencial" */ "../views/Autores.vue");
const Perfis = () =>  import(/* webpackChunkName: "Gerencial" */ "../views/Perfis.vue");
const Usuarios = () =>  import(/* webpackChunkName: "Gerencial" */ "../views/Usuarios.vue");
const Editoras = () =>  import(/* webpackChunkName: "Gerencial" */ "../views/Editoras.vue");

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "consultas",
    component: Consultas,
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
  },
  {
    path: "/acervo",
    name: "acervo",
    component: Acervo,
    meta: {
      auth: true
    }
  },
  {
    path: "/autores",
    name: "autores",
    component: Autores,
    meta: {
      auth: true
    }
  },
  {
    path: "/perfis",
    name: "perfis",
    component: Perfis,
    meta: {
      auth: true
    }
  },
  {
    path: "/usuarios",
    name: "usuarios",
    component: Usuarios,
    meta: {
      auth: true
    }
  },
  {
    path: "/editoras",
    name: "editoras",
    component: Editoras,
    meta: {
      auth: true
    }
  },
];

Vue.router = new VueRouter({
  mode: "history",
  routes
});

export default Vue.router;
