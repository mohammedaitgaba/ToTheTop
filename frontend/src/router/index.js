import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import posts from '../views/posts.vue'

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
  ]
})

export default router
