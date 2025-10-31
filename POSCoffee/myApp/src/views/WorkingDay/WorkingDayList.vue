<template>
    <ion-page>
        <AppBar>{{(t("Working Day List"))}}</AppBar>
    <ion-content>
        This is Working Day Page
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import AppBar from "@/views/Layout/AppBar.vue"
const t = window.t
</script>