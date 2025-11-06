<template>
    <div>
        <AppBar>{{ t("Currency List") }}</AppBar>
<!-- {{ data }} -->
        <div>
            <div >
            <ion-fab slot="fixed" vertical="bottom" horizontal="end" @click="openModal">
              <ion-fab-button >
                <ion-icon :icon="add"></ion-icon>
            </ion-fab-button>
            </ion-fab>
        </div>
     
        <DataTable :value="data" showGridlines stripedRows scrollable scrollHeight="92vh"  tableStyle="min-width: 50rem" class="mt-2">
            <Column :header="t('No.')" class="p-3" :bodyStyle="{ textAlign: 'center' }"  style="width: 50px">
                <template #body="slotProps">
                    {{ slotProps.index + 1 }}
                </template>
            </Column>
            <Column field="name" :header="t('Name#')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.name }}</span>
            </template>
            </Column>
            <Column field="symbol" :header="t('Symbol')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.symbol }}</span>
            </template>
            </Column>
            <Column field="owner" :header="t('Created By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.owner }}</span>
            </template>
            </Column>
            <Column field="created_at" :header="t('Created At')" sortable class="p-2" style="width: 300px;">
            <template #body="slotProps">
                <span class="p-2">{{ dayjs(slotProps.data.created_at).format("DD-MM-YYYY") }}</span>
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
        </div>
    </div>
</template>

<script setup>
import dayjs from "dayjs";
import AppBar from "@/views/Layout/AppBar.vue"
import { onMounted, ref } from 'vue';
import axios from 'axios';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { IonFabButton, IonIcon,modalController } from '@ionic/vue';
import { add } from 'ionicons/icons';
import CurrencyAdd from '@/views/Currency/components/CurrencyAdd.vue'
import CurrencyEdit from '@/views/Currency/components/CurrencyEdit.vue'
const t = window.t

const data = ref()

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/currency');
    if(res.data){
        data.value = res.data;
    }
}
async function onEdit(id){
    const modal = await modalController.create({
        component: CurrencyEdit,
         componentProps: { id },
        cssClass: 'currency-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CurrencyAdd,
    cssClass: 'currency-modal',
  });
  await modal.present();
};

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this currency?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/currency/${id}`);
      if (deleteRes.data.success) {
        alert(t("Currency deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete currency"));
    }
  }
}

onMounted(()=>{
    getdata();
})

</script>