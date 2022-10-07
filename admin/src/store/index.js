
import { createStore } from 'vuex';

// Initialise le store
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
});

export default store;