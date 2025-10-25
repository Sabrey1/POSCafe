<template>

    
      <ion-header>
        <ion-toolbar>
          <ion-buttons slot="start">
            <ion-menu-button />
          </ion-buttons>
          <ion-title><slot></slot></ion-title>
          <ion-buttons slot="end">
            <slot name="end"></slot>
            
            <ion-button v-if="showNewOrderButton" fill="solid" shape="round" color="primary" class="mr-2"  >
    <ion-icon slot="start"  :icon="addCircleOutline"></ion-icon>
    {{ t("Test") }}
  </ion-button>
            <ComUserProfile class="mr-2" />
          </ion-buttons>
         
        </ion-toolbar>
      </ion-header>

  </template>
  <script setup lang="ts">
  import {  IonButtons, IonTitle, IonMenuButton } from '@ionic/vue';
 
  
    import {addCircleOutline} from 'ionicons/icons';
   
    const props = defineProps({
      showNewOrderButton:Boolean
    })
    
const t = window.t

  </script>
  