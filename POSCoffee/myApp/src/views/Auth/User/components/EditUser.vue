<template>
    <div>
        <h2 class="mb-2 text-center">{{t("Edit User")}}</h2>
        <ion-grid>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Name')"  v-model="users.name" label-placement="floating" fill="outline" :placeholder="t('Enter name')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Email')" v-model="users.email" label-placement="floating" fill="outline" :placeholder="t('Enter Email')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                      <ion-item lines="none">
                        <ion-input :label="t('Password')" v-model="users.password" label-placement="floating" fill="outline" :placeholder="t('Enter Password')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                   <ion-item lines="none">
              <ion-select
                aria-label="role"
                fill="outline"
                v-model="users.role_id"
                interface="popover"
                :placeholder="t('Select Role')"
              >
                <ion-select-option value="2">{{ t("Manager") }}</ion-select-option>
                <ion-select-option value="3">{{ t("User") }}</ion-select-option>
                <ion-select-option value="4">{{ t("Guest") }}</ion-select-option>
              </ion-select>
            </ion-item>
                </ion-col>
            </ion-row>
             <br>
                <ion-button expand="block" color="primary" @click="userEdit">{{t("Save")}}</ion-button>
            
        </ion-grid>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, reactive} from 'vue'
const t = window.t
import axios from 'axios'
import {
  IonContent,
  IonItem,
  IonInput,
  IonButton,
  IonSelect,
  IonSelectOption,
  modalController,
} from "@ionic/vue";

const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});

const users = reactive({
  name: "",
  email: "",
  password: "",
  role_id: "",
})

const loadUser = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/users/${props.id}`);
    Object.assign(users, response.data.data || response.data)
    console.log("Loaded user:", users)
  } catch (error) {
    console.error("Error loading user:", error);
    alert("Failed to load user data");
  }
};

// const userEdit = async () => {
//   try {
//     const response = await axios.put(`http://127.0.0.1:8000/api/user/${props.id}`,user.value);

//     console.log("user updated:", response.data);
//     alert("user updated successfully!");
//     close();
//   } catch (error) {
//     console.error("Error updating user:", error);
//     alert("Failed to update user");
//   }
// };


onMounted(() => {
  loadUser();
});

</script>