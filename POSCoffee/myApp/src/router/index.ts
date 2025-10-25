import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import HomePage from '../views/HomePage.vue'
import CustomerList from '@/views/Customer/CustomerList.vue'
import EmployeeList from '@/views/Employee/EmployeeList.vue'
import Dashboard from '@/views/Dashboard/Dashboard.vue'
import Order from '@/views/Order/Order.vue'
import RoleList from '@/views/Role/RoleList.vue'
import positionList from '@/views/Position/positionList.vue'

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
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/order',
    name: 'Order',
    component: Order
  },
  {
    path: '/role-list',
    name: 'RoleList',
    component: RoleList
  },
  {
    path: '/position-list',
    name: 'positionList',
    component: positionList
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
