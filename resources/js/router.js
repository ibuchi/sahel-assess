import { createMemoryHistory, createRouter } from 'vue-router'

import LoginComponent from './components/LoginComponent.vue'
import DashboardComponent from './components/DashboardComponent.vue'

const routes = [
  { path: '/login', component: LoginComponent },
  { path: '/dashboard', component: DashboardComponent },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})

export default router