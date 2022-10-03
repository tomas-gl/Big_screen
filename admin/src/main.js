import { createApp } from 'vue'
import { Vuex } from 'vuex'; 
import App from './App.vue'
import routes from './router/index'
import store from './store/index'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

const app = createApp(App)
// const store = createStore({
// 	// You state might be more complex than this
// 	state: {
// 		count: 1
// 	},
// 	mutations: {
//         initialiseStore(state) {
// 			// Check if the ID exists
// 			if(localStorage.getItem('loggedAdmin')) {
// 				this.replaceState(
// 					Object.assign(state, JSON.parse(localStorage.getItem('loggedAdmin'))),
// 					// console.log(localStorage.getItem('loggedAdmin')),
// 				);
// 			}
// 		}
//     },
// 	getters: {}
// });
app.use(Vuex);
app.use(routes);
app.use(store);
app.use(ElementPlus)

app.mount('#app')