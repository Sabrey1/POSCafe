<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Edit Role")}}</h2>
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

      <ion-button expand="block" color="primary" @click="editRole" class="mt-3">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { IonContent, IonItem , IonInput, IonButton } from '@ionic/vue';

const t = window.t

const role = ref({
    role_code: "",
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

// Load specific customer by ID
const loadRole = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/role/${props.id}`);

    // handle case where backend wraps data in `data`
    role.value = response.data.data || response.data;
    console.log("Fetching role with ID:", props.id);
    console.log("Loaded role:", role.value);
  } catch (error) {
    console.error("Error loading role:", error);
    alert("Failed to load role data");
  }
};


const editRole = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/role/${props.id}`,
      role.value
    );

    console.log("role updated:", response.data);
    alert("role updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating role:", error);
    alert("Failed to update role");
  }
};

onMounted(() => {
  loadRole();
});

</script>
