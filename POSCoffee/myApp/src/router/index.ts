import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import HomePage from '../views/HomePage.vue'
import CustomerList from '@/views/Customer/CustomerList.vue'
import EmployeeList from '@/views/Employee/EmployeeList.vue'
import Dashboard from '@/views/Dashboard/Dashboard.vue'
import Order from '@/views/Order/Order.vue'
import RoleList from '@/views/Role/RoleList.vue'
import positionList from '@/views/Position/positionList.vue'
import workingDay from "@/views/WorkingDay/WorkingDay.vue"
import Shift from '@/views/Shift/Shift.vue'
import OrderList from '@/views/Order/OrderList.vue'
import Report from '@/views/Report/Report.vue'
import Setting from '@/views/Setting/setting.vue'
import Product from '@/views/Product/Product.vue'
import Category from '@/views/Category/Category.vue'
import NotFound from '@/views/Layout/NotFound.vue'
import WorkingDayList from '@/views/WorkingDay/WorkingDayList.vue'
import Login from '@/views/Auth/Login.vue'
import UserInfo from "@/views/Layout/UserProfile/UserInfo.vue"

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/login'
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
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
  },
  {
    path: '/working-day',
    name: 'workingDay',
    component: workingDay
  },
  {
    path: '/working-day-list',
    name: 'WorkingDayList',
    component: WorkingDayList
  },
  {
    path: '/shift',
    name: 'Shift',
    component: Shift
  },
  {
    path: '/order-list',
    name: 'OrderList',
    component: OrderList
  },
  {
    path: '/report',
    name: 'Report',
    component: Report
  },
  {
    path: '/setting',
    name: 'Setting',
    component: Setting
  },
  {
    path: '/product',
    name: 'Product',
    component: Product
  },
  {
    path: '/category',
    name: 'Category',
    component: Category
  },
  {
    path: '/user-info',
    name: 'UserInfo',
    component: UserInfo
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})


router.beforeEach((to, from, next) => {
  const user = JSON.parse(localStorage.getItem('user'))

  if (to.path !== '/login' && !user) {
    next('/login')
    return
  }

  const allowedRoles = to.meta.roles
  if (allowedRoles && user) {
    if (allowedRoles.includes(user.position)) {
      next()
    } else {
      next('/somepage')
    }
  } else {
    next()
  }
})

export default router

