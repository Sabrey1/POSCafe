<template>
    <AppBar>{{t("User List")}}</AppBar>
    <div>
        <div >
            <ion-fab slot="fixed" vertical="bottom" horizontal="end" @click="openModal">
              <ion-fab-button >
                <ion-icon :icon="add"></ion-icon>
            </ion-fab-button>
            </ion-fab>
        </div>
     {{ data }}
        <DataTable :value="data" showGridlines stripedRows  tableStyle="min-width: 50rem" class="mt-2">
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
            <Column field="email" :header="t('Email')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.email }}</span>
            </template>
            </Column>
            <Column field="role_id" :header="t('Role')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.role_id }}</span>
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
</template>

<script setup>
import AppBar from "@/views/Layout/AppBar.vue"
import DataTable from 'primevue/datatable';
import CreateUser from "@/views/Auth/User/components/CreateUser.vue"
import Column from 'primevue/column';
import dayjs from "dayjs";
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
import axios from "axios"; 
import { onMounted, ref } from "vue";
const data = ref();

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/user');
    if(res.data){
        data.value = res.data
    }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CreateUser,
    cssClass: 'user-modal',
  });
  await modal.present();
};

onMounted(() => {
    getData();
})

const t = window.t
</script>