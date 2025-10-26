<template>
    <ion-page>
        <ion-header>
        <ion-toolbar>
            <ion-title>{{ t("Category List") }}</ion-title>
        </ion-toolbar>
        </ion-header>
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

            <Column field="image" :header="t('Image')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-4">{{ slotProps.data.image }}</span>
            </template>
            </Column>
            <!-- Other columns with padding -->
            <Column field="name" :header="t('Name#')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.name }}</span>
            </template>
            </Column>
            <Column field="note" :header="t('Note')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.note }}</span>
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

<script setup >
import { onMounted, ref } from 'vue';
import axios from 'axios';
const t = window.t
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
import categoryAdd from '@/views/Category/components/categoryAdd.vue'
const data = ref();

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/category');
    if(res.data){
        data.value = res.data;
    }

}

const openModal = async () => {
  const modal = await modalController.create({
    component: categoryAdd,
    cssClass: 'category-modal',
  });
  await modal.present();
};

onMounted(()=>{
    getdata();
})
</script>