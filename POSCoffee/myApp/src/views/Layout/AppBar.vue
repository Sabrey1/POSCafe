<template>
  <ion-header :translucent="true">
    <ion-toolbar>
      <ion-buttons slot="start">
        <ion-menu-button />
      </ion-buttons>
      <ion-title class="p-0">
        <slot></slot>
      </ion-title>
    </ion-toolbar>
  </ion-header>
</template>
<script setup lang="ts">

const t = window.t;
 
</script>
 