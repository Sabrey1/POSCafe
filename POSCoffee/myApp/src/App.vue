<template>
  <IonApp>
    <ion-menu content-id="main-content">
      <ion-header>
        <ion-toolbar>
          <ion-title>{{ t("Coffee Shop") }}</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-content class="ion-padding">
        <Drawer />
      </ion-content>
    </ion-menu>

    <IonRouterOutlet id="main-content" />
  </IonApp>
</template>

<script setup>
import { IonApp, IonRouterOutlet, IonMenu, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue'
import Drawer from "@/views/Layout/Drawer.vue"
const t = window.t
</script>