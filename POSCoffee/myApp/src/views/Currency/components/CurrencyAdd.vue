<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 ml-3">{{ t("Add Currency") }}</h2>
      <div>
            <ion-item lines="none">
              <ion-input
                v-model="currency.currency_code"
                :label="t('Currency Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter currency code')"
              />
            </ion-item>
          
            <ion-item lines="none">
              <ion-input
                v-model="currency.name"
                :label="t('Currency Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter currency')"
              />
            </ion-item>

            <ion-item lines="none">
              <ion-select
                v-model="currency.symbol"
                aria-label="symbol"
                fill="outline"
                interface="popover"
                :placeholder="t('Select symbol')"
              >
                <ion-select-option value="$">{{ t("$") }}</ion-select-option>
                <ion-select-option value="៛">{{ t("៛") }}</ion-select-option>
              </ion-select>
            </ion-item>
            <ion-item lines="none">
              <ion-input
                v-model="currency.description"
                :label="t('Description')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter description')"
              />
            </ion-item>   
       
            <ion-item lines="none">
              <ion-input
                v-model="currency.note"
                :label="t('Note')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter note')"
                style="height: 100px;"
              />
            </ion-item>     
        <br />
        <div>
            <ion-button expand="block" color="primary" @click="addCurrency">
          {{ t("Cancel") }}
        </ion-button>
        <ion-button expand="block" color="primary" @click="addCurrency">
          {{ t("Save") }}
        </ion-button>
        </div>
        
      </div>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from "vue";
import {
  modalController,
} from "@ionic/vue";

import app from '@/services/api-service.js';

const t = window.t;

// Bind data
const currency = ref({
  currency_code: "",
  name: "",
  symbol:"",
  description:"",
  note:""
});

// Function to close modal
const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

// Function to insert data
const addCurrency = async () => {
  try {
    await app.postApi("currency", currency.value);
    close();
  } catch (error) {
    console.error("Error adding currency:", error);
  }
};
</script>
