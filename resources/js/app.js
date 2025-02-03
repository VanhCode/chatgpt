import '../js/bootstrap';
import App from '../js/App.vue';
import router from "../js/router/router.js";
import { createApp } from 'vue';

const app = createApp(App);

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.use(router);

app.mount('#app');
