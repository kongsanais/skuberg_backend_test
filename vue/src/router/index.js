import Vue from "vue";
import VueRouter from "vue-router";
import Home from "@/views/Home.vue";
import About from "@/views/About.vue"
import Register from "@/views/Register.vue"
import Trade_menu  from "@/views/trade_main.vue"
Vue.use(VueRouter);
const routes = [
  {
    path: "/home",
    name: "home",
    component: Home
  },
  {
    path: "/about",
    name: "about",
    component: About
  },
  {
    path: "/register",
    name: "register",
    component: Register
  },
  {
    path : "/trade_menu",
    name : "trade_menu",
    component: Trade_menu   
  },
  {
    path: "/",
    redirect: "/home"
  },
  {
    path: "*",
    redirect: "/home"
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
