<template>
    <ion-footer>
        <ion-toolbar>
            <ion-title class="ion-text-center">
                 <ion-button color="danger">{{ t("Cancel") }}</ion-button>
                 <ion-button color="warning">{{ t("View Working Day") }}</ion-button>
                 <ion-button color="success">{{ t("Open Working Day") }}</ion-button>
            </ion-title>
        </ion-toolbar>
    </ion-footer>
</template>

<script setup lang="ts">
import { IonFooter, IonTitle, IonToolbar } from '@ionic/vue';
const t = window.t
</script>