<template>
    <IonPage>
        <AppBar>{{ t("Currency List") }}</AppBar>
       
            <div >
            <ion-fab slot="fixed" vertical="bottom" horizontal="end" @click="openModal">
              <ion-fab-button >
                <ion-icon :icon="add"></ion-icon>
            </ion-fab-button>
            </ion-fab>
        </div>
     <IonContent>
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
        </IonContent>
        
    </IonPage>
</template>

<script setup>
import dayjs from "dayjs";
import { add } from 'ionicons/icons';
import {useCurrency} from '@/hooks/useCurrency.js'

const { data,onDelete,onEdit,openModal } = useCurrency()

const t = window.t
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar } from '@ionic/vue';
</script>