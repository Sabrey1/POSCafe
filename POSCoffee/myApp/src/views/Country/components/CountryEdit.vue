<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Add Currency") }}</h2>

      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="country.country_code"
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
                v-model="country.name"
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
        <ion-button expand="block" color="primary" @click="editCountry">
          {{ t("Save") }}
        </ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
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


const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});


// Bind data
const country = ref({
  country_code: "",
  name: "",
  description:"",
  note:""
 
});

// Load specific customer by ID
const loadcountry = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/country/${props.id}`);

    // handle case where backend wraps data in `data`
    country.value = response.data.data || response.data;
    console.log("Fetching country with ID:", props.id);
    console.log("Loaded country:", country.value);
  } catch (error) {
    console.error("Error loading country:", error);
    alert("Failed to load country data");
  }
};


// Function to close modal
const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

// Update data
const editCountry = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/country/${props.id}`,
      country.value
    );

    console.log("country updated:", response.data);
    alert("country updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating country:", error);
    alert("Failed to update country");
  }
};


onMounted(() => {
  loadcountry();
});

</script>
