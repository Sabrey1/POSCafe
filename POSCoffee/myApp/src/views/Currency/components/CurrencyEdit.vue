<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Edit Currency") }}</h2>
      <div> 
        <div>
          <div>
            <ion-label>{{ t("Currency Code") }}</ion-label>
          </div>
          <ion-input
            v-model="currency.currency_code"
            :label="t('Currency Code')"
            label-placement="floating"
            fill="outline"
            :placeholder="t('Enter currency code')"
          />
        </div>
        <div>
          <div>
            <ion-label>{{ t("Currency Name") }}</ion-label>
          </div>
          <ion-input
            v-model="currency.name"
            :label="t('Enter Currency Name')"
            label-placement="floating"
            fill="outline"
            :placeholder="t('Enter currency')"
          />
        </div>
        <div>
          <div>
            <ion-label>{{ t("Symbol") }}</ion-label>
          </div>
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
        </div>
        <div>
          <ion-input
            v-model="currency.description"
            :label="t('Description')"
            label-placement="floating"
            fill="outline"
            :placeholder="t('Enter description')"
          />
        </div>
        <div>
          <ion-input
            v-model="currency.note"
            :label="t('Note')"
            label-placement="floating"
            fill="outline"
            :placeholder="t('Enter note')"
            style="height: 100px;"
          />
        </div>
        <br />
        <div>
          <ion-button expand="block" color="primary" @click="editcurrency">
            {{ t("Cancel") }}
          </ion-button>
          <ion-button expand="block" color="primary" @click="editcurrency">
            {{ t("Save") }}
          </ion-button>
        </div>   
      </div>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref,onMounted } from "vue";
import app from '@/services/api-service.js';

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
   const response =  await app.getApi(`currency/${props.id}`);
    currency.value = response.data.data || response.data;
  } catch (error) {
    console.error("Error loading currency:", error);
  }
};

const editcurrency = async () => {
  try {
    await app.putApi(
      `currency/${props.id}`,
      currency.value
    );

    close();
  } catch (error) {
    console.error("Error updating currency:", error);
  }
};

onMounted(() => {
  loadCurrency();
});
</script>
