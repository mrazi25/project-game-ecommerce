import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoggedHomeView from '../views/LoggedHome.vue'
import GameCollections from '../views/GameCollections.vue'
import RegisterPage from '../views/RegisterPage.vue'
import LoginPage from '../views/LoginPage.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/logged',
    name: 'logged-home',
    component: LoggedHomeView
  },
  {
    path: '/GameCollections',
    name: 'games',
    component: GameCollections
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
})

export default router
