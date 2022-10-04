
import { createStore } from 'vuex';

// Initialise the store
const store = createStore({
	state: {
		loggedAdmin: localStorage.getItem('loggedAdmin')
	},
	mutations: {
        addAdmin(state) {
			if(localStorage.getItem('loggedAdmin')) {
				this.replaceState(
					Object.assign(state, JSON.parse(localStorage.getItem('loggedAdmin'))),
				);
			}
		},
    }
});

store.subscribe( (state) => {
    localStorage.setItem('loggedAdmin',  JSON.stringify(state));
	console.log(localStorage.getItem('loggedAdmin'));
});

export default store;