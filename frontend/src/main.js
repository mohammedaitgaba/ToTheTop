import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import AOS from "aos"
import "aos/dist/aos.css"
import './index.css'


const app = createApp(App)

app.use(router)

app.mount('#app')

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
// createApp(App).use(VueSweetalert2)
app.use(VueSweetalert2);