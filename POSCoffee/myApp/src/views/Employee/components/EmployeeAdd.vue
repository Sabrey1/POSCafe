<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Add Employee")}}</h2>
<ion-grid>
     <ion-row>
        <ion-col>
            <!-- Employee Name -->
            <ion-item lines="none">
                <ion-input :label="t('Employee Name')" label-placement="floating" fill="outline" :placeholder="t('Enter name customer')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <!-- Employee Gender -->
                <ion-select aria-label="gender" fill="outline" interface="popover" :placeholder="t('Select gender')">
                    <ion-select-option value="male">{{t("Male")}}</ion-select-option>
                    <ion-select-option value="female">{{t("Female")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
      </ion-row>
    
    <ion-row>
        <ion-col>
            <!-- Email -->
            <ion-item lines="none">
                <ion-input :label="t('Email')" label-placement="floating" fill="outline" :placeholder="t('Enter email')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <ion-input :label="t('Phone Number')" label-placement="floating" fill="outline" :placeholder="t('Enter phone number')"></ion-input>
            </ion-item>
        </ion-col>
    </ion-row>
    <ion-row>
        <ion-col>
            <!-- Adress -->
            <ion-item lines="none">
                <ion-input :label="t('Adress')" label-placement="floating" fill="outline" :placeholder="t('Enter Adress')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <!-- Employee Role -->
                <ion-select aria-label="role" fill="outline" interface="popover" :placeholder="t('Select Role')">
                    <ion-select-option value="user">{{t("User")}}</ion-select-option>
                    <ion-select-option value="admin">{{t("Admin")}}</ion-select-option>
                    <ion-select-option value="Manager">{{t("Manager")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
    </ion-row>
    <ion-row>
        <ion-col>
            <!-- Hire Date -->
            <ion-item lines="none">
                <ion-input :label="t('Hire Date')" label-placement="floating" type="date" fill="outline" :placeholder="t('Enter Hire Date')"></ion-input>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <!-- Employee Role -->
                <ion-select aria-label="employee_type" fill="outline" interface="popover" :placeholder="t('Select Employee Type')">
                    <ion-select-option value="vip">{{t("VIP")}}</ion-select-option>
                    <ion-select-option value="normal">{{t("Normal")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
    </ion-row>

    <ion-row>
        <ion-col>
            <ion-item lines="none">
                <!-- Employee Position -->
                <ion-select aria-label="position" fill="outline" interface="popover" :placeholder="t('Select Role')">
                    <ion-select-option value="ITSupport">{{t("IT Support")}}</ion-select-option>
                    <ion-select-option value="NetworkManager">{{t("Network Manager")}}</ion-select-option>
                    <ion-select-option value="Manager">{{t("Manager")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <ion-input :label="t('Salary')" label-placement="floating" type="number" fill="outline" :placeholder="t('Enter Salary')"></ion-input>
            </ion-item>
        </ion-col>
    </ion-row>

    <ion-row>
       <ion-col>
             <ion-item lines="none">
                <!-- Employee Position -->
                <ion-select aria-label="status" fill="outline" interface="popover" :placeholder="t('Select Status')">
                    <ion-select-option value="active">{{t("Active")}}</ion-select-option>
                    <ion-select-option value="inactive">{{t("Inactive")}}</ion-select-option>
                </ion-select>
            </ion-item>
        </ion-col>
        <ion-col>
            <ion-item lines="none">
                <ion-input :label="t('Note')" label-placement="floating" fill="outline" :placeholder="t('Enter Note')"></ion-input>
            </ion-item>
        </ion-col>
    </ion-row>
    <ion-row>
       <ion-col>
               <ion-checkbox label-placement="end">Disabled</ion-checkbox>
        </ion-col>
        <ion-col>
            
        </ion-col>
    </ion-row>    
      <ion-button expand="block" color="primary" @click="close">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption,IonCheckbox  } from '@ionic/vue';

const t = window.t

const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

</script>
