<template>
  <ion-content class="ion-padding">
    <div class="category-form">
      <header class="form-header">
        <h2>{{ t("Add Category") }}</h2>
      </header>

      <div class="form-fields">
        <div class="form-field">
          <ion-label>{{ t("Category Code") }}</ion-label>
          <ion-input
            v-model="category.category_code"
            fill="outline"
            :placeholder="t('Enter category code')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Category Name") }}</ion-label>
          <ion-input
            v-model="category.name"
            fill="outline"
            :placeholder="t('Enter category name')"
          />
        </div>

        <div class="form-field">
          <ion-label>{{ t("Description") }}</ion-label>
          <ion-input
            v-model="category.description"
            fill="outline"
            :placeholder="t('Enter description')"
          />
        </div>
      </div>

      <footer class="form-actions">
        <ion-button fill="outline" color="medium" @click="close">
          {{ t("Cancel") }}
        </ion-button>
        <ion-button color="primary" @click="addCategory">
          {{ t("Save") }}
        </ion-button>
      </footer>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from "vue";
import axios from "axios";
import { modalController } from "@ionic/vue";
import app from "@/services/api-service.js";

const t = window.t;

const category = ref({
  category_code: "",
  name: "",
  description: "",
  note: "",
});

const addCategory = async () => {
  try {
    const response = await app.postApi(
      "category",
      category.value
    );

    console.log("Category added:", response.data);
    alert("Category added successfully!");
    await close();
  } catch (error) {
    console.error("Error adding category:", error);
    alert("Failed to add category");
  }
};

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};
</script>

<style scoped>
.category-form {
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
