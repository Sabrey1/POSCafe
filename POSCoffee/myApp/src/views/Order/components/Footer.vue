<template>
    <ion-chip color="danger" @click="back">{{ t("Cancel") }}</ion-chip>
    <ion-chip color="success">{{t('Save')}}</ion-chip>
    <ion-chip color="primary" id="print">{{t('Print')}}</ion-chip>
      <ion-popover trigger="print" :dismiss-on-select="true">
    <ion-content>
      <ion-list>
        <ion-item :button="true" :detail="false">KH</ion-item>
        <ion-item :button="true" :detail="false">EN</ion-item>
      </ion-list>
    </ion-content>
  </ion-popover>
    <ion-chip color="danger" id="quick-payment">{{t('Quick Payment')}}</ion-chip>
    <ion-popover trigger="quick-payment" :dismiss-on-select="true">
    <ion-content>
      <ion-list>
        <ion-item :button="true" :detail="false">Khmer</ion-item>
        <ion-item :button="true" :detail="false">USD</ion-item>
      </ion-list>
    </ion-content>
  </ion-popover>

    <ion-chip color="secondary" id="popover-button">{{t('More')}}</ion-chip>
    <ion-popover trigger="popover-button" :dismiss-on-select="true">
    <ion-content>
      <ion-list>
        <ion-item :button="true" :detail="false">Option 1</ion-item>
        <ion-item :button="true" :detail="false">Option 2</ion-item>
      </ion-list>
    </ion-content>
  </ion-popover>
    
</template>

<script setup>
const t = window.t
  import { IonButton, IonContent, IonPopover } from '@ionic/vue';
function back(){
    window.history.back()
}
</script>

 