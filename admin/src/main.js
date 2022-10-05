import { createApp } from 'vue'
import Vuex from 'vuex'; 
import App from './App.vue'
import routes from './router/index'
import store from './store/index'
import ElementPlus from 'element-plus'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import 'element-plus/theme-chalk/display.css'
import 'element-plus/dist/index.css'
import './assets/css/main.css';

const app = createApp(App)

app.use(Vuex);
app.use(routes);
app.use(store);
app.use(ElementPlus);
for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
    app.component(key, component)
  }

app.mount('#app')