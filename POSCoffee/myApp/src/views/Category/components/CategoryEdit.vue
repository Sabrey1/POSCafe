<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Edit Category")}}</h2>
<ion-grid>
    <ion-row>
        <ion-col>
            <!-- Category Code -->
            <ion-item lines="none">
                <ion-input :label="t('Category Code')" v-model="category.category_code" label-placement="floating" fill="outline" :placeholder="t('Enter category code')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
              <!-- Category Name -->
            <ion-item lines="none">
                <ion-input :label="t('Category Name')" v-model="category.name" label-placement="floating" fill="outline" :placeholder="t('Enter category name')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Description')" v-model="category.description" label-placement="floating" fill="outline" :placeholder="t('Enter description')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             <!-- Note -->
            <ion-item lines="none">
                <ion-input :label="t('Note')" v-model="category.note" label-placement="floating" fill="outline" :placeholder="t('Enter note')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>

      <br>
      <ion-button expand="block" color="primary" @click="editCategory">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption  } from '@ionic/vue';
const t = window.t

const category = ref({
    category_code: "",
    name: "",
    description: "",
    note: "",
})

const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

const loadCustomer = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/category/${props.id}`);

    // handle case where backend wraps data in `data`
    category.value = response.data.data || response.data;
    console.log("Fetching category with ID:", props.id);
    console.log("Loaded category:", category.value);
  } catch (error) {
    console.error("Error loading category:", error);
    alert("Failed to load category data");
  }
};


const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

const editCategory = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/category/${props.id}`,
      category.value
    );

    console.log("category updated:", response.data);
    alert("category updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating category:", error);
    alert("Failed to update category");
  }
};

// Load data when modal opens
onMounted(() => {
  loadCustomer();
});

</script>
    