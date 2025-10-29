<template>
 <ion-menu content-id="main-content">
    <ion-header>
      <ion-toolbar>
        <ion-title>{{t("Coffee Shop")}}</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content class="ion-padding">
      <Drawer />
    </ion-content>
  </ion-menu>
  <ion-page id="main-content">
    <ion-header>
      <ion-toolbar>
        <ion-buttons slot="start">
          <ion-menu-button></ion-menu-button>
        </ion-buttons>
        <div style="display: flex;">
        <ion-title>{{t("Home")}}</ion-title>
        <ion-item lines="none" >
          <Timer style="margin-right: 10px"/>
          <UserProfile slot="end" />
        </ion-item>
        </div>
      </ion-toolbar>
    </ion-header>
    <ion-content>
      <!-- <div style="z-index:-1;position: absolute;">
         <img src="/image/image.jpg" style="height: 92vh;width: 100vw;" />
      </div> -->

      <div style="vertical-align: center; horizontal-align: center; display: flex; justify-content: center; align-items: center; height: 100%;">
      <CardHome />


      <p @click="showSuccess()">Hello</p>

        <Toast />
      </div>
      
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { useToast } from "primevue/usetoast";
import Drawer from "@/views/Layout/Drawer.vue"
import UserProfile from "@/views/Layout/UserProfile/UserProfile.vue"
import CardHome from "@/views/Layout/CardHome.vue"
import Timer from "@/views/Layout/Timer.vue"
import Toast from 'primevue/toast';
const t = window.t

const toast = useToast();
window.toast = toast

function showSuccess() {
  toast.add({
    severity: 'success',
    summary: 'Success',
    detail: 'Logged in successfully!',
    life: 3000
  })
}

</script>
 
