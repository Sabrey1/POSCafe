<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Add Customer") }}</h2>

      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.customer_code"
                :label="t('Customer Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter customer code')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.name"
                :label="t('Customer Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter name customer')"
              />
            </ion-item>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-select
                v-model="customer.gender"
                aria-label="gender"
                fill="outline"
                interface="popover"
                :placeholder="t('Select gender')"
              >
                <ion-select-option value="Male">{{ t("Male") }}</ion-select-option>
                <ion-select-option value="Female">{{ t("Female") }}</ion-select-option>
              </ion-select>
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.email"
                :label="t('Email')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter email')"
              />
            </ion-item>
          </ion-col>
        </ion-row>

        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.phone"
                :label="t('Phone Number')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter phone number')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-select
                v-model="customer.status"
                aria-label="status"
                fill="outline"
                interface="popover"
                :placeholder="t('Select Status')"
              >
                <ion-select-option value="active">{{ t("Active") }}</ion-select-option>
                <ion-select-option value="inactive">{{ t("Inactive") }}</ion-select-option>
              </ion-select>
            </ion-item>
          </ion-col>
        </ion-row>

        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.address"
                :label="t('Address')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter Address')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-select
                v-model="customer.customer_type"
                aria-label="customer_type"
                fill="outline"
                interface="popover"
                :placeholder="t('Select Customer Type')"
              >
                <ion-select-option value="Regular">{{ t("Regular") }}</ion-select-option>
                <ion-select-option value="Vip">{{ t("VIP") }}</ion-select-option>
              </ion-select>
            </ion-item>
          </ion-col>
        </ion-row>

        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.country"
                :label="t('Country')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter Country')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="customer.note"
                :label="t('Note')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter Note')"
              />
            </ion-item>
          </ion-col>
        </ion-row>

        <br />
        <ion-button expand="block" color="primary" @click="addCustomer">
          {{ t("Save") }}
        </ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from "vue";
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

// Bind data
const customer = ref({
  customer_code: "",
  name: "",
  gender: "",
  email: "",
  phone: "",
  status: "",
  address: "",
  customer_type: "",
  country: "",
  note: "",
});

// Function to close modal
const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

// Function to insert data
const addCustomer = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/customer", customer.value);

    console.log("Customer added:", response.data);
    alert("Customer added successfully!");
    close();
  } catch (error) {
    console.error("Error adding customer:", error);
    alert("Failed to add customer");
  }
};
</script>
