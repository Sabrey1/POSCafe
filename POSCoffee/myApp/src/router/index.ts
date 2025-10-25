import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import HomePage from '../views/HomePage.vue'
import CustomerList from '@/views/Customer/CustomerList.vue'
import EmployeeList from '@/views/Employee/EmployeeList.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'Home',
    component: HomePage
  },
  {
    path: '/customer-list',
    name: 'CustomerList',
    component: CustomerList
  },
  {
    path: '/employee-list',
    name: 'EmployeeList',
    component: EmployeeList
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
