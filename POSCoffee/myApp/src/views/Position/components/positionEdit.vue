<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Position")}}</h2>
<ion-grid>
    <ion-row>
        <ion-col>
            <!-- Role Code -->
            <ion-item lines="none">
                <ion-input :label="t('Position Code')" v-model="position.position_code" label-placement="floating" fill="outline" :placeholder="t('Enter Position code')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
              <!-- Role Name -->
            <ion-item lines="none">
                <ion-input :label="t('Position Name')" v-model="position.name" label-placement="floating" fill="outline" :placeholder="t('Enter position name')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Description')" v-model="position.description" label-placement="floating" fill="outline" :placeholder="t('Enter description')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             <!-- Note -->
            <ion-item lines="none">
                <ion-input :label="t('Note')" v-model="position.note" label-placement="floating" fill="outline" :placeholder="t('Enter note')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
      <br>
      <ion-button expand="block" color="primary" @click="editPosition">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import axios from "axios";
import { IonContent, IonItem, IonInput, IonButton, modalController } from '@ionic/vue';

const t = window.t

const position = ref({
  position_code: "",
  name: "",
  description: "",
  note: "",
});

const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

const loadPosition = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/position/${props.id}`);

    // handle case where backend wraps data in `data`
    position.value = response.data.data || response.data;
    console.log("Fetching position with ID:", props.id);
    console.log("Loaded position:", position.value);
  } catch (error) {
    console.error("Error loading position:", error);
    alert("Failed to load position data");
  }
};

const editPosition = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/category/${props.id}`,
      position.value
    );

    console.log("position updated:", response.data);
    alert("position updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating position:", error);
    alert("Failed to update position");
  }
};


onMounted(()=>{
    loadPosition();
})

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

</script>
