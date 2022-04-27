import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// import Vue from 'vue'
// import { VueTypedJs } from 'vue-typed-js'
 
// Vue.use(VueTypedJs)

const app = createApp(App)

app.use(router)

app.mount('#app')

