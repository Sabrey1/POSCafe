<template>
         <IonPage>  
             <AppBar>{{t("Customer List")}}</AppBar>
              <div>
                        <ion-fab slot="fixed" vertical="bottom" horizontal="end" @click="openModal">
                        <ion-fab-button >
                            <ion-icon :icon="add"></ion-icon>
                        </ion-fab-button>
                        </ion-fab>
                    </div>
            <IonContent>
                  

            <div class="py-2 px-2">
                <IconField>
                    <InputIcon class="pi pi-search" />
                    <InputText v-model="value1" placeholder="Search" fluid  size="large"/>
                </IconField>
            </div>
            <DataTable
            :value="data"
            showGridlines
            stripedRows
            
            tableStyle="min-width: 50rem"
            class="mt-2">
           
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
            <Column :header="t('Action')" sortable class="p-2" style="width: 300px;">
            <template #body="slotProps">
                <div class="flex gap-2 align-items-center justify-content-center">
                    <CustomerShow :customer="slotProps.data" />
                    <ion-button fill="outline" size="small" color="primary" @click="onEdit(slotProps.data.id)">{{t("Edit")}}</ion-button>
                    <ion-button fill="outline" size="small" color="danger" @click="onDelete(slotProps.data.id)">{{t("Delete")}}</ion-button>
                </div>
            </template>
            </Column>
        </DataTable>
        </IonContent> 
        </IonPage>   
</template>

<script setup lang="ts">
import dayjs from 'dayjs';
import { add } from 'ionicons/icons';
import { useCustomer } from "@/hooks/useCustomer.js"
import { ref } from 'vue';
import CustomerShow from '@/views/Customer/components/CustomerShow.vue'

const value1 = ref(null);

const { data,onDelete,onEdit,openModal } = useCustomer();
const t = window.t
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar } from '@ionic/vue';
</script>