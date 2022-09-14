import { createApp } from 'vue'
import App from './App.vue'

import PrimeVue from 'primevue/config';
import ButtonComponent from 'primevue/button';
import InputText from 'primevue/inputtext';

import 'primevue/resources/themes/bootstrap4-dark-blue/theme.css'

const app = createApp(App);

app.use(PrimeVue);

app.component('ButtonComponent', ButtonComponent);
app.component('InputText', InputText);

app.mount('#app')
