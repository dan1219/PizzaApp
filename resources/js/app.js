import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import {createApp} from 'vue'
import {createRouter,createWebHashHistory,createWebHistory} from 'vue-router'
import App from './layouts/App.vue'

import Home from './layouts/Home.vue'
import Cart from './layouts/Cart.vue'
import Checkout from './layouts/Checkout.vue'

const routes = [
  { path: '/', component: Home, name:"Home"},
  { path: '/cart', component: Cart, name:"Cart" },
  { path: '/checkout', component: Checkout, name:"Checkout"}
]

const router = createRouter({

  history: createWebHistory(),
  routes,
})

const app = createApp(App)

app.use(router)

app.mount('#app')
