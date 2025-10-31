<template>
<ion-page>
        <AppBar>{{(t("Shift"))}}</AppBar>
    <ion-content>
        This is Shift Page
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import AppBar from "@/views/Layout/AppBar.vue"
const t = window.t

</script>