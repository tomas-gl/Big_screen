import { createApp } from 'vue'
import App from './App.vue'
import routes from './router/index'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

const app = createApp(App)
app.use(routes)
app.use(ElementPlus)

app.mount('#app')
