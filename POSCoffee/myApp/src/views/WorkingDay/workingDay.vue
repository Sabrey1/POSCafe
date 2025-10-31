<template>
<ion-page>
        <ToolBar>{{(t("Working Day"))}}</ToolBar> 
    <ion-content>
        This is Working Day Page
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import ToolBar from "@/views/Layout/ToolBar.vue"
const t = window.t
</script>