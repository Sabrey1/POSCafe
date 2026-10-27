<template>
  <ion-content class="ion-padding">
    <div class="currency-form">
      <header class="form-header">
        <h2>{{ t("Edit Currency") }}</h2>
      </header>

      <div class="form-fields">
        <div class="form-field">
          <ion-label>{{ t("Currency Code") }}</ion-label>
          <ion-input
            v-model="currency.currency_code"
            fill="outline"
            :placeholder="t('Enter currency code')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Currency Name") }}</ion-label>
          <ion-input
            v-model="currency.name"
            fill="outline"
            :placeholder="t('Enter currency')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Symbol") }}</ion-label>
          <ion-select
            v-model="currency.symbol"
            fill="outline"
            interface="popover"
            :placeholder="t('Select symbol')"
          >
            <ion-select-option value="$">{{ t("$") }}</ion-select-option>
            <ion-select-option value="៛">{{ t("៛") }}</ion-select-option>
          </ion-select>
        </div>

        <div class="form-field">
          <ion-label>{{ t("Description") }}</ion-label>
          <ion-input
            v-model="currency.description"
            fill="outline"
            :placeholder="t('Enter description')"
          />
        </div>
      </div>

      <footer class="form-actions">
        <ion-button fill="outline" color="medium" @click="close">
          {{ t("Cancel") }}
        </ion-button>
        <ion-button color="primary" @click="editcurrency">
          {{ t("Save") }}
        </ion-button>
      </footer>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import { modalController } from "@ionic/vue";
import app from "@/services/api-service.js";

const t = window.t;
const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

const currency = ref({
  currency_code: "",
  name: "",
  symbol: "",
  description: "",
  note: "",
});

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

const loadCurrency = async () => {
  try {
    const response = await app.getApi(`currency/${props.id}`);
    currency.value = response.data || response;
  } catch (error) {
    console.error("Error loading currency:", error);
  }
};

const editcurrency = async () => {
  try {
    await app.putApi(`currency/${props.id}`, currency.value);
    await close();
  } catch (error) {
    console.error("Error updating currency:", error);
  }
};

onMounted(() => {
  loadCurrency();
});
</script>

<style scoped>
.currency-form {
  width: min(100%, 680px);
  margin: 0 auto;
  padding: 8px 4px;
}

.form-header {
  margin-bottom: 24px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--ion-color-light-shade);
}

.form-header h2 {
  margin: 0;
  color: var(--ion-color-dark);
  font-size: 1.35rem;
  font-weight: 600;
}

.form-fields {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.form-field {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-field ion-label {
  color: var(--ion-color-dark);
  font-weight: 500;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
  gap: 12px;
  margin-top: 28px;
}

.form-actions ion-button {
  min-width: 112px;
  margin: 0;
}
</style>