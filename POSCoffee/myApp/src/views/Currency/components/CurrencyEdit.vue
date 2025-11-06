<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Edit Currency") }}</h2>

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
        <ion-button expand="block" color="primary" @click="editcurrency">
          {{ t("Save") }}
        </ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref,onMounted } from "vue";
import axios from "axios";
import {
  IonContent,
  IonItem,
  IonInput,
  IonButton,
  IonSelect,
  IonSelectOption,

} from "@ionic/vue";

const t = window.t;

const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

// Bind data
const currency = ref({
  currency_code: "",
  name: "",
  symbol:"",
  description:"",
  note:""
 
});


const loadCurrency = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/currency/${props.id}`);

    // handle case where backend wraps data in `data`
    currency.value = response.data.data || response.data;
    console.log("Fetching currency with ID:", props.id);
    console.log("Loaded currency:", currency.value);
  } catch (error) {
    console.error("Error loading currency:", error);
    alert("Failed to load currency data");
  }
};

const editcurrency = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/currency/${props.id}`,
      currency.value
    );

    console.log("currency updated:", response.data);
    alert("currency updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating currency:", error);
    alert("Failed to update currency");
  }
};

// Load data when modal opens
onMounted(() => {
  loadCurrency();
});


</script>
