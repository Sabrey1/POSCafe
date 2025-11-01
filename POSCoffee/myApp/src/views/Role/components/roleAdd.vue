<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Role")}}</h2>
<ion-grid>
    <ion-row>
        <ion-col>
            <!-- Role Code -->
            <ion-item lines="none">
                <ion-input :label="t('Role Code')" v-model="role.role_code" label-placement="floating" fill="outline" :placeholder="t('Enter role code')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
              <!-- Role Name -->
            <ion-item lines="none">
                <ion-input :label="t('Role Name')" v-model="role.name" label-placement="floating" fill="outline" :placeholder="t('Enter role name')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>
     <ion-row>
        <ion-col>
             <ion-item lines="none">
                <ion-input :label="t('Description')" v-model="role.description" label-placement="floating" fill="outline" :placeholder="t('Enter description')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
             <!-- Note -->
            <ion-item lines="none">
                <ion-input :label="t('Note')" v-model="role.note" label-placement="floating" fill="outline" :placeholder="t('Enter note')"></ion-input>
            </ion-item>
        </ion-col>
      </ion-row>

      <ion-button expand="block" color="primary" @click="postData" class="mt-3">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption  } from '@ionic/vue';

const t = window.t

const role = ref({
    role_code: "",
    name: "",
    description: "",
    // status:"",
    note: "",
})

const postData = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/role", role.value);

    console.log("Role added:", response.data);
    alert("Role added successfully!");
    close();
  } catch (error) {
    console.error("Error adding role:", error);
    alert("Failed to add role");
  }
};


const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

</script>
