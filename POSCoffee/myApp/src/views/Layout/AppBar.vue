<template>
  <ion-header>
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
</script>

<style scoped>
ion-toolbar {
  --min-height: 75px; /* default is around 56px */
}
</style>

 