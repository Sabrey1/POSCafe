<template>
    <ion-page>
        <ion-header>
            <ion-toolbar>
                <ion-title>Customer List</ion-title>
            </ion-toolbar>
        </ion-header>
        <ion-content>

           <!-- <Search v-model="data" placeholder="Search Customers" /> -->

        <DataTable :value="data" showGridlines stripedRows  tableStyle="min-width: 50rem" class="mt-2">
            <Column header="No." class="p-3" style="width: 50px">
                <template #body="slotProps">
                    {{ slotProps.index + 1 }}
                </template>
            </Column>
            <!-- Other columns with padding -->
            <Column field="name" header="Name#" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.name }}</span>
            </template>
            </Column>

            <Column field="gender" header="Gender" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.gender }}</span>
            </template>
            </Column>

            <Column field="email" header="Email" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-4">{{ slotProps.data.email }}</span>
            </template>
            </Column>

            <Column field="phone" header="Phone Number" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.phone }}</span>
            </template>
            </Column>
        </DataTable>
        </ion-content>
    </ion-page>
</template>

<script setup lang="ts">
import axios from 'axios';
import { onMounted, ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Search from '@/views/Layout/Search.vue';

const data = ref();

async function getdate (){
 const res = await axios.get('http://127.0.0.1:8000/api/customer')

    if (res.data){
        data.value = res.data;
        console.log(data.value);
    }
}

onMounted(() => {
    getdate();
});

</script>