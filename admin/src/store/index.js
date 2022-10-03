
import { createStore } from 'vuex';
// Initialise your store
const store = createStore({
	// You state might be more complex than this
	state: {
		loggedAdmin: localStorage.getItem('loggedAdmin')
	},
	mutations: {
        initialiseStore(state) {
			// Check if the ID exists
			if(localStorage.getItem('loggedAdmin')) {
				this.replaceState(
					Object.assign(state, JSON.parse(localStorage.getItem('loggedAdmin'))),
					// console.log(localStorage.getItem('loggedAdmin')),
				);
			}
		}
    },
	getters: {}
});

// store.subscribe( (state) => {
//     localStorage.setItem('loggedAdmin',  JSON.stringify(state));
// 	console.log(localStorage.getItem('loggedAdmin'));
//     // return state
// });

// return loggedAdmin;

export default store;