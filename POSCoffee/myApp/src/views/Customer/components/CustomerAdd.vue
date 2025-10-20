<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Customer")}}</h2>
<ion-grid>
     <ion-row>
        <ion-col>
            <!-- Customer Name -->
            <ion-item lines="none">
                <ion-input :label="t('Customer Name')" label-placement="floating" fill="outline" :placeholder="t('Enter name customer')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <!-- Customer Gender -->
                <ion-select aria-label="gender" fill="outline" interface="popover" :placeholder="t('Select gender')">
                    <ion-select-option value="male">{{t("Male")}}</ion-select-option>
                    <ion-select-option value="female">{{t("Female")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
      </ion-row>
    
    <ion-row>
        <ion-col>
            <!-- Email -->
            <ion-item lines="none">
                <ion-input :label="t('Email')" label-placement="floating" fill="outline" :placeholder="t('Enter email')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <ion-input :label="t('Phone Number')" label-placement="floating" fill="outline" :placeholder="t('Enter phone number')"></ion-input>
            </ion-item>
        </ion-col>
    </ion-row>
    <ion-row>
        <ion-col>
            <!-- Email -->
            <ion-item lines="none">
                <ion-input :label="t('Adress')" label-placement="floating" fill="outline" :placeholder="t('Enter Adress')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             
        </ion-col>
    </ion-row>
      
      <br>
      <ion-button expand="block" color="primary" @click="close">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption  } from '@ionic/vue';

const t = window.t

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};



</script>
