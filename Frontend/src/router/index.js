import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/Customer/HomeView.vue'
import AdminPage from '../views/AdminPage.vue'
import CartView from '../views/CartView.vue'
import GameCollections from '../views/Customer/GameCollections.vue'
import RegisterPage from '../views/RegisterPage.vue'
import LoginPage from '../views/LoginPage.vue'

import EditProduct from '../views/Admin/EditProduct.vue'
import ListAccount from '../views/Admin/ListAccount.vue'
import ListProduct from '../views/Admin/ListProduct.vue'
import ListOrder from '../views/Admin/ListOrder.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/GameCollections',
    name: 'games',
    component: GameCollections
  },
  {
    path: '/AdminPage',
    name: 'admin',
    component: AdminPage
  },
  {
    path: '/CartView',
    name: 'cart',
    component: CartView
  },
  {
    path: '/RegisterPage',
    name: 'register',
    component: RegisterPage
  },
  {
    path: '/LoginPage',
    name: 'login',
    component: LoginPage
  },
  {
    path: '/EditProduct',
    name: 'editProduct',
    component: EditProduct
  },
  {
    path: '/ListAccount',
    name: 'listAccount',
    component: ListAccount
  },
  {
    path: '/ListProduct',
    name: 'listProduct',
    component: ListProduct
  },
  {
    path: '/ListOrder',
    name: 'listOrder',
    component: ListOrder
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

export default router
