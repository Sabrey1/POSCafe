<template>
<div>
        <AppBar>{{(t("Shift List"))}}</AppBar>
    <div>
        
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

            <Column field="date" :header="t('Date')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ dayjs(slotProps.data.date).format("DD-MM-YYYY") }}</span>
            </template>
            </Column>
            <Column field="note" :header="t('Note')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.note}}</span>
            </template>
            </Column>
            <Column field="open_by" :header="t('Open By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.open_by}}</span>
            </template>
            </Column>
            <Column field="close_by" :header="t('Open By')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.close_by}}</span>
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

<script setup lang="ts">
import dayjs from 'dayjs';
const t = window.t

import { useShift } from "@/hooks/useShift.js"
const { data,onDelete,onEdit } = useShift()
</script>