<template>
    <ion-page>
        <ion-header>
            <ion-toolbar>
                <ion-title>Customer List</ion-title>
            </ion-toolbar>
        </ion-header>
        <ion-content>
        <DataTable :value="data" showGridlines tableStyle="min-width: 50rem" class="mt-2">
            <Column header="No.">
                <template #body="slotProps">
                    {{ slotProps.index + 1 }}
                </template>
            </Column>
            <!-- Other columns with padding -->
    <Column field="name" header="Name#" sortable>
      <template #body="slotProps">
        <span class="p-2">{{ slotProps.data.name }}</span>
      </template>
    </Column>

    <Column field="gender" header="Gender" sortable>
      <template #body="slotProps">
        <span class="p-2">{{ slotProps.data.gender }}</span>
      </template>
    </Column>

    <Column field="email" header="Email" sortable>
      <template #body="slotProps">
        <span class="p-4">{{ slotProps.data.email }}</span>
      </template>
    </Column>

    <Column field="phone" header="Phone Number" sortable>
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