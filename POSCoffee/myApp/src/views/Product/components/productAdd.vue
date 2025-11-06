<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Product")}}</h2>
<ion-grid>
    <ion-row>
        <ion-col>
            <!-- prodiuct Code -->
            <ion-item lines="none">
                <ion-input :label="t('Product Code')" label-placement="floating" fill="outline" :placeholder="t('Enter product code')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
              <!-- product Name -->
            <ion-item lines="none">
                <ion-input :label="t('Product Name')" v-model="product.name" label-placement="floating" fill="outline" :placeholder="t('Enter product name')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Description')" v-model="product.description" label-placement="floating" fill="outline" :placeholder="t('Enter description')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             <!-- price -->
            <ion-item lines="none">
                <ion-input :label="t('Price')" v-model="product.price" type="number" label-placement="floating" fill="outline" :placeholder="t('Enter price')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Quantity')" v-model="product.quantity" type="number" label-placement="floating" fill="outline" :placeholder="t('Enter quantity')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
  <ion-select
    aria-label="category_id"
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
</ion-item>
        </ion-col>
      </ion-row>
       <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Note')" v-model="product.note" label-placement="floating" fill="outline" :placeholder="t('Enter note')"></ion-input>
            </ion-item>
        </ion-col>
        
      </ion-row>

      <br>
      <ion-button expand="block" color="primary" @click="addProduct">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import axios from "axios";
import { IonContent, IonItem, IonInput, IonButton, modalController, IonSelect, IonSelectOption  } from '@ionic/vue';

const t = window.t
const categories = ref([]);
const product = ref({
  product_code: "",
  name: "",
  description: "",
  price: "",
  quantity: "",
  category_id: "",
  note: "",
});


async function loadCategories() {
  try {
    const res = await axios.get("http://127.0.0.1:8000/api/category");
    categories.value = res.data;
  } catch (err) {
    console.error("Failed to load categories:", err);
  }
}

const addProduct = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/product", product.value);

    console.log("product added:", response.data);
    alert("product added successfully!");
    close();
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
