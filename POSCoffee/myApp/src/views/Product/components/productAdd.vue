<template>
  <ion-content class="ion-padding">
    <div class="product-form">
      <header class="form-header">
        <h2>{{ t("Add Product") }}</h2>
      </header>

      <div class="form-fields">
        <div class="form-field">
          <ion-label>{{ t("Product Code") }}</ion-label>
          <ion-input
            v-model="product.product_code"
            fill="outline"
            :placeholder="t('Enter product code')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Product Name") }}</ion-label>
          <ion-input
            v-model="product.name"
            fill="outline"
            :placeholder="t('Enter product name')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Description") }}</ion-label>
          <ion-input
            v-model="product.description"
            fill="outline"
            :placeholder="t('Enter description')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Price") }}</ion-label>
          <ion-input
            v-model="product.price"
            type="number"
            fill="outline"
            :placeholder="t('Enter price')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Quantity") }}</ion-label>
          <ion-input
            v-model="product.quantity"
            type="number"
            fill="outline"
            :placeholder="t('Enter quantity')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Category") }}</ion-label>
          <ion-select
            v-model="product.category_id"
            fill="outline"
            interface="popover"
            :placeholder="t('Select category')"
          >
            <ion-select-option
              v-for="cat in categories"
              :key="cat.id"
              :value="cat.id"
            >
              {{ cat.name }}
            </ion-select-option>
          </ion-select>
        </div>
      </div>

      <footer class="form-actions">
        <ion-button fill="outline" color="medium" @click="close">
          {{ t("Cancel") }}
        </ion-button>
        <ion-button color="primary" @click="addProduct">
          {{ t("Save") }}
        </ion-button>
      </footer>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import axios from "axios";
import { modalController } from "@ionic/vue";

import app from "@/services/api-service.js";

const t = window.t;
const categories = ref([]);
const product = ref({
  product_code: "",
  name: "",
  description: "",
  price: "",
  quantity: "",
  category_id: "",
});

async function loadCategories() {
  try {
    const res = await app.getApi("category");
    categories.value = res.data ?? res;

    console.log("Categories loaded:", categories.value);
  } catch (err) {
    console.error("Failed to load categories:", err);
  }
}

const addProduct = async () => {
  try {
    const response = await app.postApi(
      "product",
      product.value
    );

    console.log("product added:", response.data);
    alert("product added successfully!");
    await close();
  } catch (error) {
    console.error("Error adding product:", error);
    alert("Failed to add product");
  }
};

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

onMounted(() => {
  loadCategories();
});
</script>

<style scoped>
.product-form {
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
