<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{ t("Edit Woring Day") }}</h2>

      <ion-grid>
        <!-- Customer Code + Name -->
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="workingDay.working_day_code"
                :label="t('Working Day Code')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter working day code')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="workingDay.name"
                :label="t('Working Day Name')"
                label-placement="floating"
                fill="outline"
                :placeholder="t('Enter working day name')"
              />
            </ion-item>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="workingDay.date"
                :label="t('Working Date')"
                label-placement="floating"
                type="date"
                fill="outline"
                :placeholder="t('Enter working date')"
              />
            </ion-item>
          </ion-col>
          <ion-col>
            <ion-item lines="none">
              <ion-input
                v-model="workingDay.description"
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
                v-model="workingDay.note"
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
        <ion-button expand="block" color="primary" @click="editWorkingDay">
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
const workingDay = ref({
  working_day_code: "",
  name: "",
  date:"",
  description: "",
  note: "",
});

// Load specific customer by ID
const loadWorkingDay = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/workingday/${props.id}`);

    workingDay.value = response.data.data || response.data;
    console.log("Fetching workingday with ID:", props.id);
    console.log("Loaded workingday:", workingDay.value);
  } catch (error) {
    console.error("Error loading workingday:", error);
    alert("Failed to load workingday data");
  }
};
 
 
const editWorkingDay = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/workingday/${props.id}`,
      workingDay.value
    );

    console.log("workingDay updated:", response.data);
    alert("workingDay updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating workingDay:", error);
    alert("Failed to update workingDay");
  }
};

// Load data when modal opens
onMounted(() => {
  loadWorkingDay();
});
</script>

<style scoped>
.modal-container {
  max-width: 800px;
  margin: 0 auto;
}
</style>
