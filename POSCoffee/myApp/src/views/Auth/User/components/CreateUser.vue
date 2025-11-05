<template>
    <div>
        <h2 class="mb-2 text-center">{{t("Add Category")}}</h2>
        <ion-grid>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Name')" v-model="user.name" label-placement="floating" fill="outline" :placeholder="t('Enter name')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Email')" v-model="user.email" label-placement="floating" fill="outline" :placeholder="t('Enter Email')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                      <ion-item lines="none">
                        <ion-input :label="t('Password')" v-model="user.password" label-placement="floating" fill="outline" :placeholder="t('Enter Password')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                   <ion-item lines="none">
              <ion-select
                aria-label="role"
                fill="outline"
                v-model="user.role_id"
                interface="popover"
                :placeholder="t('Select Role')"
              >
                <ion-select-option value="Regular">{{ t("Manager") }}</ion-select-option>
                <ion-select-option value="Vip">{{ t("User") }}</ion-select-option>
                <ion-select-option value="1">{{ t("Guest") }}</ion-select-option>
              </ion-select>
            </ion-item>
                </ion-col>
            </ion-row>
             <br>
                <ion-button expand="block" color="primary" @click="User">{{t("Save")}}</ion-button>
            
        </ion-grid>
    </div>
</template>

<script setup>
import {ref} from "vue";
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption  } from '@ionic/vue';
import axios from "axios";
const t = window.t


const user = ref({
  name: "",
  email: "",
  password: "",
  role_id: "",
})

const User = async () => {
  try {
    // Replace URL with your API endpoint
    const response = await axios.post("http://127.0.0.1:8000/api/user", user.value);

    console.log("User added:", response.data);
    alert("User added successfully!");
    close();
  } catch (error) {
    console.error("Error adding user:", error);
    alert("Failed to add user");
  }
};


</script>