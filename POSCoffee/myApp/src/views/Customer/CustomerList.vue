<template>
    <ion-page style="overflow-y: hidden;">
        <ToolBar>
            <ion-toolbar>
                <ion-title class="p-0">{{t("Customer List")}}</ion-title>
            </ion-toolbar>
        </ToolBar>
        <ion-content class="content">
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
            <Column field="owner" :header="t('Created By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.owner }}</span>
            </template>
            </Column>
            <Column field="created_at" :header="t('Created At')" sortable class="p-2" headerStyle="text-center" bodyStyle="text-center" style="width: 300px;">
            <template #body="slotProps">
                {{ dayjs(slotProps.data.created_at).format("DD-MM-YYYY") }}
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
import dayjs from 'dayjs';
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
import CustomerAdd from "@/views/Customer/components/CustomerAdd.vue"
import CustomerEdit from "@/views/Customer/components/CustomerEdit.vue"
import ToolBar from "@/views/Layout/ToolBar.vue"
const t = window.t
const data = ref();

async function getdate (){
 const res = await axios.get('http://127.0.0.1:8000/api/customer')

    if (res.data){
        data.value = res.data;
        console.log(data.value);
    }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: CustomerEdit,
         componentProps: { id },
        cssClass: 'custom-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CustomerAdd,
    cssClass: 'custom-modal',
  });
  await modal.present();
};

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this customer?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/customer/${id}`);
      if (deleteRes.data.success) {
        alert(t("Customer deleted successfully"));
        await getdate();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete customer"));
    }
  }
}

onMounted(() => {
    getdate();
});

</script>

<style> 
.content {
    overflow-y: hidden;
}
</style>