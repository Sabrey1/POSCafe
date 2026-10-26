<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Edit Country") }}</h2>
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
          :placeholder="t('Enter Country Name')"
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
        <div>
          <ion-button expand="block" color="primary" @click="editCountry">
            {{ t("Cancel") }}
          </ion-button>
          <ion-button expand="block" color="primary" @click="editCountry">
            {{ t("Save") }}
          </ion-button>
        </div>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import { modalController } from "@ionic/vue";
import app from '@/services/api-service.js';

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

const loadcountry = async () => {
  try {
   const response =  await app.getApi(`country/${props.id}`);
    country.value = response.data;
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
     await app.putApi(
      `country/${props.id}`,
      country.value
    );  
    close();
  } catch (error) {
    console.error("Error updating country:", error);
  }
};
onMounted(() => {
  loadcountry();
});

</script>
