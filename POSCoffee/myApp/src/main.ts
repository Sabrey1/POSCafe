import { createApp } from 'vue'
import App from './App.vue'
import router from './router';
import i18n from './i18n'
import dayjs from './helpers/dayjs.js'
import api from '@/services/api-service.js'
 
import { 
  IonicVue, 
  IonButton, 
  IonItem, 
  IonList, 
  IonPopover,
  IonContent,
  IonHeader,
  IonPage,
  IonTitle,
  IonToolbar
} from '@ionic/vue'
/* Core CSS required for Ionic components to work properly */
import '@ionic/vue/css/core.css';

/* Basic CSS for apps built with Ionic */
import '@ionic/vue/css/normalize.css';
import '@ionic/vue/css/structure.css';
import '@ionic/vue/css/typography.css';

/* Optional CSS utils that can be commented out */
import '@ionic/vue/css/padding.css';
import '@ionic/vue/css/float-elements.css';
import '@ionic/vue/css/text-alignment.css';
import '@ionic/vue/css/text-transformation.css';
import '@ionic/vue/css/flex-utils.css';
import '@ionic/vue/css/display.css';

/**
 * Ionic Dark Mode
 * -----------------------------------------------------
 * For more info, please see:
 * https://ionicframework.com/docs/theming/dark-mode
 */

/* @import '@ionic/vue/css/palettes/dark.always.css'; */
/* @import '@ionic/vue/css/palettes/dark.class.css'; */
import '@ionic/vue/css/palettes/dark.system.css';

/* Theme variables */
import './theme/variables.css';

import AppBar from "@/views/Layout/AppBar.vue"
import ToolBar from "@/views/Layout/ToolBar.vue"

/* PrimeVue CSS */

import Toast from 'primevue/toast'

import Aura from '@primeuix/themes/aura';


import 'primeicons/primeicons.css';
import 'primeflex/primeflex.css';
 import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice'

const app = createApp(App)
  .use(IonicVue)
  .use(router)
.use(PrimeVue)
.use(i18n);


// ✅ Global registration of Ionic components
app.component('IonButton', IonButton)
app.component('IonItem', IonItem)
app.component('IonList', IonList)
app.component('IonPopover', IonPopover)
app.component('IonContent', IonContent)
app.component('IonHeader', IonHeader)
app.component('IonPage', IonPage)
app.component('IonTitle', IonTitle)
app.component('IonToolbar', IonToolbar)
app.component('Toast', Toast) // 👈 register globally
app.use(ToastService)
app.config.globalProperties.$dayjs = dayjs;

// Provide globally
app.provide('api', api)
// use this for call api
// import { inject } from 'vue'
// const api = inject('api') 

window.t = (key) => i18n.global.t(key)
router.isReady().then(() => {
  app.mount('#app');
});