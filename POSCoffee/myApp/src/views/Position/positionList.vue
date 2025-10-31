<template>
<ion-page>
        <AppBar>{{ t("Position List") }}</AppBar>
        <ion-content class="ion-padding">
          
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
            <Column field="position_code" :header="t('Position Code')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.position_code }}</span>
            </template>
            </Column>
            <Column field="name" :header="t('Name#')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.name }}</span>
            </template>
            </Column>
            <Column field="owner" :header="t('Created By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.owner }}</span>
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
const t = window.t
import axios from 'axios';
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
import positionAdd from '@/views/Position/components/positionAdd.vue'
import AppBar from "@/views/Layout/AppBar.vue"

const data = ref();

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/position');
    if(res.data){
        data.value = res.data;
    }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: positionAdd,
    cssClass: 'position-modal',
  });
  await modal.present();
};


onMounted(()=>{
    getdata();
});
</script>