<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-buttons slot="start">
          <ion-menu-button></ion-menu-button>
        </ion-buttons>
        <div style="display: flex;">
          <ion-title class="p-0">{{ t("Home") }}</ion-title>
          <ion-item lines="none">
            <Timer style="margin-right: 10px" />
            <UserProfile slot="end" />
          </ion-item>
        </div>
      </ion-toolbar>
    </ion-header>
    <ion-content>
      <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
        <CardHome />
      </div>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonButtons, IonMenuButton, IonItem } from '@ionic/vue'
import UserProfile from "@/views/Layout/UserProfile/UserProfile.vue"
import CardHome from "@/views/Layout/CardHome.vue"
import Timer from "@/views/Layout/Timer.vue"
const t = window.t
</script>

<style scoped>
ion-toolbar {
  --min-height: 75px;
}
</style>