<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Category")}}</h2>
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
      <ion-button expand="block" color="primary" @click="addCategory">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption  } from '@ionic/vue';
const t = window.t

const category = ref({
    category_code: "",
    name: "",
    description: "",
    note: "",
})

const addCategory = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/category", category.value);

    console.log("Category added:", response.data);
    alert("Category added successfully!");
    close();
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
    