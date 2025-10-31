<template>
    <ion-page>
        <ToolBar>{{(t("User Info"))}}</ToolBar>
    <ion-content>
        This is User Info Page
    </ion-content>
</ion-page>
    
</template>
<script setup>
import ToolBar from "@/views/Layout/ToolBar.vue"

const t = window.t
</script>