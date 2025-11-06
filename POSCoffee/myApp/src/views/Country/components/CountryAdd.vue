<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Add Country") }}</h2>

      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="country.country_code"
                :label="t('Country Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter country code')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="country.name"
                :label="t('Country Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter country name')"
              />
            </ion-item>
          </ion-col>
        </ion-row>
        <ion-row>
          
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="country.description"
                :label="t('Description')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter description')"
              />
            </ion-item>
          </ion-col>
           <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="country.note"
                :label="t('Note')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter note')"
                
              />
            </ion-item>
          </ion-col>
        </ion-row>      
             
        <br />
        <ion-button expand="block" color="primary" @click="addCountry">
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
const country = ref({
  country_code: "",
  name: "",
  description:"",
  note:""
 
});

// Function to close modal
const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

// Function to insert data
const addCountry = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/country", country.value);

    console.log("country added:", response.data);
    alert("country added successfully!");
    close();
  } catch (error) {
    console.error("Error adding country:", error);
    alert("Failed to add country");
  }
};
</script>
