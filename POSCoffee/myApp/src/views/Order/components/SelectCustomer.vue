<template>
    <!-- {{ saleDoc }} -->
    <ion-card>
        <ion-card-header>
        <ion-card-title>Card Tivdsgftle</ion-card-title>
        <ion-card-subtitle>Card Subtitle</ion-card-subtitle>
        </ion-card-header>
    </ion-card>
</template>

<script setup lang="ts">
     import { IonCard, IonCardContent, IonCardHeader, IonCardSubtitle, IonCardTitle } from '@ionic/vue';

     const props = defineProps({
        saleDoc: Object
     })
</script>