<template>
     <div>
        <AppBar>{{(t("Sale List"))}}</AppBar>
   
       <DataTable
  :value="data"
  showGridlines
  stripedRows
  scrollable
  scrollHeight="92vh"
  tableStyle="min-width: 50rem"
  class="mt-2"
>
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
            <Column field="quantity" :header="t('Quantity')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.quantity }}</span>
            </template>
            </Column>
            <Column field="total_price" :header="t('Total Amount')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.quantity }}</span>
            </template>
            </Column>
            <Column field="user_id" :header="t('By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.user_id }}</span>
            </template>
            </Column>
            <Column field="created_at" :header="t('Date')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ dayjs(slotProps.data.created_at).format("DD-MM-YYYY") }}</span>
            </template>
            </Column>
            <Column field="status" :header="t('Status')" sortable class="p-2">
            <template #body="slotProps">
                <ComStatus :status="slotProps.data.status" />
            </template>
            </Column>

            <!-- <Column :header="t('Action')" sortable class="p-2" style="width: 180px;">
            <template #body="slotProps">
                <div>
                    <ion-button fill="outline" size="small" color="primary" @click="onEdit(slotProps.data.id)">{{t("Edit")}}</ion-button>
                    <ion-button fill="outline" size="small" color="danger" @click="onDelete(slotProps.data.id)">{{t("Delete")}}</ion-button>
                </div>
            </template>
            </Column> -->
        </DataTable>
</div>
</template>

<script setup lang="ts">
import dayjs from "dayjs"
import { onMounted, ref } from "vue"
import axios from "axios"
import AppBar from "@/views/Layout/AppBar.vue"
const t = window.t
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ComStatus from "@/views/Layout/ComStatus.vue"
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import { add } from 'ionicons/icons';
const data = ref()

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/order');
    if(res.data){
        data.value = res.data
    }
}

onMounted(() => {
    getData()
})

</script>