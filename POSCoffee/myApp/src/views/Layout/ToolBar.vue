<template>
  <ion-header>
    <ion-toolbar>
      <ion-buttons slot="start">
        <ion-back-button :default-href="defaultHref"></ion-back-button>
      </ion-buttons>
      <ion-title class="p-0"><slot></slot></ion-title>
      <ion-buttons slot="end">
        <slot name="end"></slot>
      </ion-buttons>
    </ion-toolbar>
  </ion-header>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { IonBackButton, IonButtons, IonHeader, IonTitle, IonToolbar } from '@ionic/vue';
const defaultHref = ref("/home");
const router = useRouter();
const route = useRoute();

onMounted(() => {
  
  if (!window.history.state?.back) {
    defaultHref.value = "/home";
  }
});
</script>
