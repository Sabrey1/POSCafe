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
      <img src="/image/image.jpg" />
      <div>
      <CardHome />
      </div>
      
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">

import Drawer from "@/views/Layout/Drawer.vue"
import UserProfile from "@/views/Layout/UserProfile/UserProfile.vue"
import CardHome from "@/views/Layout/CardHome.vue"
import Timer from "@/views/Layout/Timer.vue"
const t = window.t
</script>
 
