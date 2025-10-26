<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Category")}}</h2>
<ion-grid>
    <ion-row>
        <ion-col>
            <!-- Category Code -->
            <ion-item lines="none">
                <ion-input :label="t('Category Code')" label-placement="floating" fill="outline" :placeholder="t('Enter category code')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
              <!-- Category Name -->
            <ion-item lines="none">
                <ion-input :label="t('Category Name')" label-placement="floating" fill="outline" :placeholder="t('Enter category name')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Description')" label-placement="floating" fill="outline" :placeholder="t('Enter description')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             <!-- Note -->
            <ion-item lines="none">
                <ion-input :label="t('Note')" label-placement="floating" fill="outline" :placeholder="t('Enter note')"></ion-input>
            </ion-item>
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
    