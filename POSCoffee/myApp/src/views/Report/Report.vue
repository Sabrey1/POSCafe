<template>
<ion-page>
        <ToolBar>{{(t("Report"))}}</ToolBar>
    <ion-content>
        This is Report Page
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import ToolBar from "@/views/Layout/ToolBar.vue"
const t = window.t
</script>