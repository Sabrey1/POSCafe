<template>
    <ion-page>
        <AppBar>{{t("Dashboard")}}</AppBar>
        <ion-content>
            Dashboard
        </ion-content>
    </ion-page>
</template>

<script setup lang="ts">
import axios from 'axios';
import dayjs from 'dayjs';
import { onMounted, ref } from 'vue';
import AppBar from "@/views/Layout/AppBar.vue"
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
 
const t = window.t

</script>