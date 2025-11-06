<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Add Currency") }}</h2>

      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="currency.currency_code"
                :label="t('Currency Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter currency code')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="currency.name"
                :label="t('Currency Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter currency')"
              />
            </ion-item>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-select
                v-model="currency.symbol"
                aria-label="symbol"
                fill="outline"
                interface="popover"
                :placeholder="t('Select symbol')"
              >
                <ion-select-option value="Male">{{ t("Male") }}</ion-select-option>
                <ion-select-option value="Female">{{ t("Female") }}</ion-select-option>
              </ion-select>
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="currency.description"
                :label="t('Description')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter description')"
              />
            </ion-item>
          </ion-col>
        </ion-row>      
        <ion-row>
          <ion-col>
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
          </ion-col>
        </ion-row>      
        <br />
        <ion-button expand="block" color="primary" @click="addCurrency">
          {{ t("Save") }}
        </ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from "vue";
import axios from "axios";
import {
  IonContent,
  IonItem,
  IonInput,
  IonButton,
  IonSelect,
  IonSelectOption,
  modalController,
} from "@ionic/vue";

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
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/currency", currency.value);

    console.log("Currency added:", response.data);
    alert("Currency added successfully!");
    close();
  } catch (error) {
    console.error("Error adding currency:", error);
    alert("Failed to add currency");
  }
};
</script>
