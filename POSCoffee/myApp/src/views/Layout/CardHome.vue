<template>
<div style="width:1000px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between;">
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="alarmOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Working Day")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="timeOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Shift")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="cartOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Sale")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="readerOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Sale List")}}
            </ion-card-content>
        </ion-card>
    </div>
    <div style="display: flex; justify-content: space-between;">
        <ion-card color="secondary" :routerLink='`/customer-list`'>
            <ion-card-header class="icon-center">
                <ion-icon :icon="peopleOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Customer List")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="barChartOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Report")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="secondary">
            <ion-card-header class="icon-center">
                <ion-icon :icon="settingsOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Setting")}}
            </ion-card-content>
        </ion-card>
        <ion-card color="danger">
            <ion-card-header class="icon-center">
            <ion-icon :icon="arrowForwardOutline"></ion-icon>
            </ion-card-header>
            <ion-card-content>
                {{t("Logout")}}
            </ion-card-content>
        </ion-card>
    </div>
</div>
</template>

<script setup lang="ts">
import { IonCard, IonCardContent, IonCardHeader, IonCardSubtitle, IonCardTitle,IonIcon  , IonSale } from '@ionic/vue';
import { logoIonic, giftOutline, settingsOutline, cartOutline, arrowForwardOutline, alarmOutline, personOutline, timeOutline, priceTagOutline, readerOutline, peopleOutline, barChartOutline } from 'ionicons/icons';
const t = window.t

</script>

<style scoped>
ion-card{
    width: 250px;
    height: 130px;
}
ion-icon{
    font-size: 50px;
    align-items: center;
}

.icon-center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 70px;
}

ion-card-content{
    font-size: 20px;
    text-align: center;
}
</style>