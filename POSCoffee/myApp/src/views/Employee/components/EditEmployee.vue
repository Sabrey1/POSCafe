<template>
  <ion-content class="ion-padding">
    <div class="modal-container">
      <h2 class="mb-2 text-center">{{t("Edit Employee")}}</h2>
        <ion-grid>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <!-- Employee code -->
                        <ion-input :label="t('Employee Code')" v-model="employee.employee_code" label-placement="floating" fill="outline" :placeholder="t('Enter employee code')"></ion-input>
                    </ion-item>
                </ion-col>
                <ion-col>
                    <!-- Employee Name -->
                    <ion-item lines="none">
                        <ion-input :label="t('Employee Name')" v-model="employee.name" label-placement="floating" fill="outline" :placeholder="t('Enter name customer')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                    <!-- Email -->
                    <ion-item lines="none">
                        <ion-input :label="t('Email')" v-model="employee.email" label-placement="floating" fill="outline" :placeholder="t('Enter email')"></ion-input>
                    </ion-item>
                </ion-col>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Phone Number')" v-model="employee.phone" label-placement="floating" fill="outline" :placeholder="t('Enter phone number')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <!-- Employee Gender -->
                        <ion-select aria-label="gender" v-model="employee.gender" fill="outline" interface="popover" :placeholder="t('Select gender')">
                            <ion-select-option value="male">{{t("Male")}}</ion-select-option>
                            <ion-select-option value="female">{{t("Female")}}</ion-select-option>
                        </ion-select>
                    </ion-item>
                </ion-col>
                <ion-col>
                    <ion-item lines="none">
                        <!-- Employee Position -->
                        <ion-select aria-label="position" v-model="employee.position" fill="outline" interface="popover" :placeholder="t('Select Position')">
                            <ion-select-option value="IT Support">{{t("IT Support")}}</ion-select-option>
                            <ion-select-option value="Network Manager">{{t("Network Manager")}}</ion-select-option>
                            <ion-select-option value="Manager">{{t("Manager")}}</ion-select-option>
                        </ion-select>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Date of Birth')" v-model="employee.dob" type="date" label-placement="floating" fill="outline" :placeholder="t('Select DOB')"></ion-input>
                    </ion-item>
                </ion-col>
                <ion-col>
                <ion-item lines="none">
                        <ion-input :label="t('Date of Hire')" v-model="employee.hire_date" type="date" label-placement="floating" fill="outline" :placeholder="t('Select Hire Date')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Salary')" v-model="employee.salary" label-placement="floating" type="number" fill="outline" :placeholder="t('Enter Salary')"></ion-input>
                    </ion-item>
                </ion-col>
                <ion-col>
                    <!-- Adress -->
                    <ion-item lines="none">
                        <ion-input :label="t('Adress')" v-model="employee.address" label-placement="floating" fill="outline" :placeholder="t('Enter Adress')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Note')" v-model="employee.note" label-placement="floating" fill="outline" style="height: 100px;" :placeholder="t('Enter Note')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <br>
            <ion-button expand="block" color="primary" @click="EditEmployee">{{t("Save")}}</ion-button>
      </ion-grid>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import { ref,onMounted } from 'vue';
import axios from 'axios';
import { IonContent, IonItem, IonLabel, IonInput, IonButton, modalController, IonList, IonSelect, IonSelectOption,IonCheckbox  } from '@ionic/vue';

const t = window.t

const employee = ref({
    employee_code: "",
    name: "",
    email:"",
    phone:"",
    gender:"",
    dob:"",
    employee_type:"",
    hire_date:"",
    position:"",
    salary:"",
    address:"",
    note:"",
});


// Load specific customer by ID
const loadEmployee = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/employee/${props.id}`);

    // handle case where backend wraps data in `data`
    employee.value = response.data.data || response.data;
    console.log("Fetching employee with ID:", props.id);
    console.log("Loaded employee:", employee.value);
  } catch (error) {
    console.error("Error loading employee:", error);
    alert("Failed to load employee data");
  }
};

const props = defineProps({
  id: {
    type: [String, Number],
    required: true,
  },
});


const close = async () => {
  const modal = await modalController.getTop();
  if (modal) await modal.dismiss();
};

// Update data
const EditEmployee = async () => {
  try {
    const response = await axios.put(
      `http://127.0.0.1:8000/api/employee/${props.id}`,
      employee.value
    );

    console.log("Employee updated:", response.data);
    alert("Employee updated successfully!");
    close();
  } catch (error) {
    console.error("Error updating Employee:", error);
    alert("Failed to update Employee");
  }
};
// Load data when modal opens
onMounted(() => {
  loadEmployee();
});

</script>
