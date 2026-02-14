<template>
    <ion-page>
            <AppBar>{{ t("Product") }}</AppBar>
        <ion-content class="ion-padding">
        <div>
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
            <Column field="category_id" :header="t('Category')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.category_id }}</span>
            </template>
            </Column>
            <Column field="price" :header="t('Price')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.price }}</span>
            </template>
            </Column>
            <Column field="quantity" :header="t('Quantity')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.quantity }}</span>
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
import { add } from 'ionicons/icons';
const t = window.t

import {useProduct} from '@/hooks/useProduct.js'
const { data,onDelete,onEdit,openModal } = useProduct()


</script>