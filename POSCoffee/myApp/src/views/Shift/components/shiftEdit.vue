<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Edit Shift") }}</h2>

      <ion-grid>
        <!-- Customer Code + Name -->
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="shift.shift_code"
                :label="t('Shift Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter Shift code')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="shift.name"
                :label="t('Shift Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter shift name')"
              />
            </ion-item>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="shift.shift_date"
                :label="t('Shift Date')"
                label-placement="floating"
                type="date"
                fill="outline"
                :placeholder="t('Enter shift date')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="shift.working_day_id"
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
                v-model="shift.note"
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
        <ion-button expand="block" color="primary" @click="editshift">
          {{ t("Save") }}
        </ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
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

// Props from parent
const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

const t = window.t;

// Default customer data
const shift = ref({
  shift_code: "",
  name: "",
  shift_date:"",
  working_day_id: "",
  note: "",
});

// Load specific customer by ID
const loadshift = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/shift/${props.id}`);

    shift.value = response.data.data || response.data;
    console.log("Fetching shift with ID:", props.id);
    console.log("Loaded shift:", shift.value);
  } catch (error) {
    console.error("Error loading shift:", error);
    alert("Failed to load shift data");
  }
};
 
 
const editshift = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/shift/${props.id}`,
      shift.value
    );

    console.log("shift updated:", response.data);
    alert("shift updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating shift:", error);
    alert("Failed to update shift");
  }
};

// Load data when modal opens
onMounted(() => {
  loadshift();
});
</script>

<style scoped>
.modal-container {
  max-width: 800px;
  margin: 0 auto;
}
</style>
