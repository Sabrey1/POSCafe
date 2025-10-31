<template>
    <ion-page>
        <ToolBar>{{t("Dashboard")}}</ToolBar>
        <ion-content>
            Dashboard
        </ion-content>
    </ion-page>
</template>

<script setup lang="ts">
import axios from 'axios';
import dayjs from 'dayjs';
import { onMounted, ref } from 'vue';
import ToolBar from "@/views/Layout/ToolBar.vue"
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
 
const t = window.t

</script>