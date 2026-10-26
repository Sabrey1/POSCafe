<template>
    <div class="p-3">
      <h2 class="mb-2 text-center">{{t("Add User")}}</h2>
      <div class="form-group">
        <div>
            <ion-label>{{t("Name")}}</ion-label>
        </div>
        <div>
          <ion-input :label="t('Name')" v-model="user.name" label-placement="floating" fill="outline" :placeholder="t('Enter name')"></ion-input>
        </div>
      </div>
          
      <div>
        <div>
            <ion-label>{{t("Email")}}</ion-label>
        </div>
        <div>
            <ion-input :label="t('Email')" v-model="user.email" label-placement="floating" fill="outline" :placeholder="t('Enter Email')"></ion-input>
        </div>
      </div>
        
      <div>
        <div>
            <ion-label>{{t("Password")}}</ion-label>
        </div>
        <div>
            <ion-input :label="t('Password')" v-model="user.password" label-placement="floating" fill="outline" :placeholder="t('Enter Password')"></ion-input>
        </div>
      </div>
            
      <div>
        <div>
            <ion-label>{{t("Role")}}</ion-label>
        </div>
        <div>
        <ion-select
          aria-label="role"
          fill="outline"
          v-model="user.role_id"
          interface="popover"
          :placeholder="t('Select Role')"
        >
          <ion-select-option value="1">{{ t("1") }}</ion-select-option>
          <ion-select-option value="2">{{ t("2") }}</ion-select-option>
          <ion-select-option value="3">{{ t("3") }}</ion-select-option>
        </ion-select>
        </div>
      </div>

      <br>
      <div class="flex">
        <ion-button expand="block" color="primary" @click="User">{{t("Cancel")}}</ion-button>
        <ion-button expand="block" color="primary" @click="User">{{t("Save")}}</ion-button>
      </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import app from '@/services/api-service.js';
const t = window.t

const user = ref({
  name: "",
  email: "",
  password: "",
  role_id: "",
})

const User = async () => {
  try {
    const response = await app.postApi("user", user.value);
    console.log("User added:", response.data);
    alert("User added successfully!"); 
    close();
  } catch (error) {
    console.error("Error adding user:", error);
  }
};
</script>