<template>
    <ion-page>
        <AppBar>{{t("Employee List")}}</AppBar>
     
        <ion-content>
        <div >
            <ion-fab slot="fixed" vertical="bottom" horizontal="end" @click="openModal">
              <ion-fab-button >
                <ion-icon :icon="add"></ion-icon>
            </ion-fab-button>
            </ion-fab>
        </div>
            
            <DataTable :value="data" showGridlines stripedRows  tableStyle="min-width: 50rem" class="mt-2">
            <Column :header="t('No.')" class="p-3" :bodyStyle="{ textAlign: 'center' }"  style="width: 50px">
                <template #body="slotProps">
                    {{ slotProps.index + 1 }}
                </template>
            </Column>
            <!-- Other columns with padding -->
            <Column field="name" :header="t('Name#')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.name }}</span>
            </template>
            </Column>

            <Column field="gender" :header="t('Gender')" sortable class="p-2" style="width:100px">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.gender }}</span>
            </template>
            </Column>

            <Column field="email" :header="t('Email')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-4">{{ slotProps.data.email }}</span>
            </template>
            </Column>

            <Column field="phone" :header="t('Phone Number')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.phone }}</span>
            </template>
            </Column>

            <Column field="hire_date" :header="t('Hire Date')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.hire_date }}</span>
            </template>
            </Column>

            <Column field="salary" :header="t('Salary')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.salary }}</span>
            </template>
            </Column>

            <Column field="position" :header="t('Position')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.position }}</span>
            </template>
            </Column>
            <Column field="created_at" :header="t('Created At')" sortable class="p-2" style="width: 300px;">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.created_at }}</span>
            </template>
            </Column>
            <Column :header="t('Action')" sortable class="p-2" style="width: 180px;">
            <template #body="slotProps">
                <div>
                    <ion-button fill="outline" size="small" color="primary" @click="onEdit(slotProps.data.id)">{{t("Edit")}}</ion-button>
                    <ion-button fill="outline" size="small" color="danger" @click="onDelete(slotProps.data.id)">{{t("Delete")}}</ion-button>
                </div>
            </template>
            </Column>
        </DataTable>
        </ion-content>
    </ion-page>
</template>

<script setup lang="ts">
import axios from 'axios';
import { ref, onMounted } from 'vue'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
import EmployeeAdd from "@/views/Employee/components/EmployeeAdd.vue"
import EditEmployee from "@/views/Employee/components/EditEmployee.vue"
import AppBar from "@/views/Layout/AppBar.vue"

const data = ref()
const t = window.t

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/employee')
    if(res.data){
        data.value = res.data
        console.log(data.value);
    }
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this employee?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/employee/${id}`);
      if (deleteRes.data.success) {
        alert(t("Employee deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete employee"));
    }
  }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: EditEmployee,
         componentProps: { id },
        cssClass: 'employee-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: EmployeeAdd,
    cssClass: 'employee-modal',
  });
  await modal.present();
};

onMounted(() => {
    getData()
})

</script>