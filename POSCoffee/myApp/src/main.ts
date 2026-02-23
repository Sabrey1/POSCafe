import { createApp } from 'vue'
import App from './App.vue'
import router from './router';
import i18n from './i18n'
import dayjs from './helpers/dayjs.js'
import api from '@/services/api-service.js'
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
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import Aura from '@primeuix/themes/aura';
import 'primeicons/primeicons.css';
import '@ionic/vue/css/palettes/dark.system.css';

import '/node_modules/primeflex/primeflex.css'

import Toast from 'primevue/toast';

/* Theme variables */
import './theme/variables.css';

import AppBar from "@/views/Layout/AppBar.vue"
import ToolBar from "@/views/Layout/ToolBar.vue"
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import Dialog from 'primevue/dialog';
import Button from 'primevue/button';



import { 
  IonLabel, 
  IonChip, 
  IonPage,
  IonContent, 
  IonicVue,
  
  IonRippleEffect,
  IonCard,
  IonCardContent,
  IonCardHeader,
  IonCardTitle,
  IonCardSubtitle, 
  IonIcon ,
  IonButton,
  
  IonHeader,
  IonToolbar,
  IonTitle,
  IonImg,
  IonSearchbar,
  IonList,
  IonItem,
  IonFab,
  IonFabButton,
  IonSegment,
  IonSegmentButton,
  IonSegmentView,
  IonRefresherContent,
  IonRefresher,
  IonProgressBar,
  IonSpinner,
  IonButtons,
  IonBackButton,
  IonInfiniteScroll,
  IonInfiniteScrollContent,
  IonFooter,
  IonModal,
  IonPopover,
  IonAvatar,
  IonDatetime,
  IonDatetimeButton,
  IonAccordionGroup,
  IonAccordion,
  IonText,
  IonInput,
  IonSelect,
  IonSelectOption,
  IonItemGroup,
  IonItemDivider,
  IonGrid,
  IonRow,
  IonCol,
  IonSplitPane,
  IonMenu,
  IonMenuToggle,
  IonMenuButton,
  
  
} from '@ionic/vue';
/* Core CSS required for Ionic components to work properly */


/**
 * Ionic Dark Mode
 * -----------------------------------------------------
 * For more info, please see:
 * https://ionicframework.com/docs/theming/dark-mode
 */

/* @import '@ionic/vue/css/palettes/dark.always.css'; */
/* @import '@ionic/vue/css/palettes/dark.class.css'; */


/* PrimeVue CSS */

// import Toast from 'primevue/toast'

// import 'primeflex/primeflex.css';


const app = createApp(App)
  .use(IonicVue)
  .use(router)
.use(PrimeVue, {
    theme: {
        preset: Aura
    }
})
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
app.component('IonLabel', IonLabel)
app.component('IonChip', IonChip)
app.component('IonCard', IonCard)
app.component('IonCardContent', IonCardContent)
app.component('IonCardHeader', IonCardHeader)
app.component('IonCardTitle', IonCardTitle)
app.component('IonCardSubtitle', IonCardSubtitle)
app.component('IonIcon', IonIcon)
app.component('IonRippleEffect', IonRippleEffect) 
app.component('IonImg', IonImg)
app.component('IonSearchbar', IonSearchbar)
app.component('IonFab', IonFab)
app.component('IonFabButton', IonFabButton) 
app.component('IonSegment', IonSegment)
app.component('IonSegmentButton', IonSegmentButton)
app.component('IonSegmentView', IonSegmentView)
app.component('IonRefresher', IonRefresher)
app.component('IonRefresherContent', IonRefresherContent)
app.component('IonProgressBar', IonProgressBar)
app.component('IonSpinner', IonSpinner) 
app.component('IonButtons', IonButtons)
app.component('IonBackButton', IonBackButton)
app.component('IonInfiniteScroll', IonInfiniteScroll)
app.component('IonInfiniteScrollContent', IonInfiniteScrollContent)
app.component('IonFooter', IonFooter)
app.component('IonModal', IonModal)
app.component('IonAvatar', IonAvatar)
app.component('IonDatetime', IonDatetime)
app.component('IonDatetimeButton', IonDatetimeButton)
app.component('IonAccordionGroup', IonAccordionGroup)
app.component('IonAccordion', IonAccordion)
app.component('IonText', IonText)
app.component('IonInput', IonInput)
app.component('IonSelect', IonSelect)
app.component('IonSelectOption', IonSelectOption)
app.component('IonItemGroup', IonItemGroup)
app.component('IonItemDivider', IonItemDivider)
app.component('IonGrid', IonGrid)
app.component('IonRow', IonRow)
app.component('IonCol', IonCol)
app.component('IonSplitPane', IonSplitPane)
app.component('IonMenu', IonMenu)
app.component('IonMenuToggle', IonMenuToggle)
app.component('IonMenuButton', IonMenuButton)
app.component('Dialog', Dialog)
 


app.component('AppBar', AppBar)
app.component('ToolBar', ToolBar)


// primvue
app.component('DataTable', DataTable)
app.component('Column', Column)
app.component('IconField', IconField)
app.component('InputIcon', InputIcon)
app.component('Toast', Toast) 
app.component('InputText', InputText) 
app.component('Button', Button) 



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