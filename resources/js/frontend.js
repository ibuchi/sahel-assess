import { createApp } from 'vue';
import router from './router'
import 'boxicons';

import LoginComponent from './components/LoginComponent.vue';
import RegistrationComponent from './components/RegistrationComponent.vue';
import DashboardComponent from './components/DashboardComponent.vue';
import CompanyComponent from './components/CompanyComponent.vue';
import ServiceComponent from './components/ServiceComponent.vue';
import ProfileComponent from './components/ProfileComponent.vue';
import HomeComponent from "./components/HomeComponent.vue";

const app = createApp({});

app.component('login-component', LoginComponent);
app.component('registration-component', RegistrationComponent);
app.component('dashboard-component', DashboardComponent);
app.component('company-component', CompanyComponent);
app.component('service-component', ServiceComponent);
app.component('profile-component', ProfileComponent);
app.component("home-component", HomeComponent);

app.mount('#app');
// app.use(router);


