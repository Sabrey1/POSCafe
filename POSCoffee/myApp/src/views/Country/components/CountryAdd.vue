<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Add Country") }}</h2>
            <div>
              <div>
                <ion-label>{{ t("Country Code") }}</ion-label>
              </div>
              <ion-input
                v-model="country.country_code"
                :label="t('Country Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter country code')"
              />
            </div>
            <div>
              <div>
                <ion-label>{{ t("Country Name") }}</ion-label>
              </div>
              <ion-input
                v-model="country.name"
                :label="t('Country Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter country name')"
              />
            </div>
            <div>
              <div>
                <ion-label>{{ t("Description") }}</ion-label>
              </div>
              <ion-input
                v-model="country.description"
                :label="t('Description')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter description')"
              />
            </div>
            <div>  
              <div>
                <ion-label>{{ t("Note") }}</ion-label>
              </div>
              <ion-input
                v-model="country.note"
                :label="t('Note')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter note')"
              /> 
            </div>   
        <br />
        <ion-button expand="block" color="primary" @click="addCountry">
          {{ t("Cancel") }}
        </ion-button>
        <ion-button expand="block" color="primary" @click="addCountry">
          {{ t("Save") }}
        </ion-button>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from "vue";
import app from "@/services/api-service.js";
import {
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
    await app.postApi("country", country.value);
    close();
  } catch (error) {
    console.error("Error adding country:", error);
  }
};
</script>
