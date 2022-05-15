import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import posts from '../views/posts.vue'
import Registration from '../views/Registration.vue'
import Login from '../views/Login.vue'
import Messanger from '../views/Messanger.vue'
import admin_dushboard from '../views/admin_dushboard.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },    
    
    {
      path: '/posts',
      name: 'posts',
      component: posts
    },
    
    {
      path: '/Registration',
      name: 'Registration',
      component: Registration
    },    
    
    {
      path: '/Login',
      name: 'Login',
      component: Login
    },  
    {
      path: '/Messanger',
      name: 'Messanger',
      component: Messanger
    },
    {
      path: '/admin_dushboard',
      name: 'admin_dushboard',
      component: admin_dushboard
    }
    
  ]
})

export default router
