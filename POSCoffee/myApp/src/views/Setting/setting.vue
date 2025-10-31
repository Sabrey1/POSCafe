<template>
<ion-page>
    <AppBar>{{(t("Setting"))}}</AppBar>
    <ion-content>
        Hello World
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import AppBar from "@/views/Layout/AppBar.vue"

const t = window.t

</script>