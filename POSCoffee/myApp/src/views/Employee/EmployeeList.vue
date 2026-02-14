<template>
    <ion-page v-if="isPageVisible" ref="myPage">
        <AppBar>{{t("Employee List")}}</AppBar>
     
        <ion-content>
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

            <Column field="hire_date" :header="t('Hire Date')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.hire_date }}</span>
            </template>
            </Column>

            <Column field="salary" :header="t('Salary')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.salary }}</span>
            </template>
            </Column>

            <Column field="position" :header="t('Position')" sortable class="p-2">
            <template #body="slotProps">
                <span class="p-2">{{ slotProps.data.position }}</span>
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

<script setup  >
import { add } from 'ionicons/icons';
const t = window.t

import {useEmployee} from '@/hooks/useEmployee.js'
const { data,onDelete,onEdit,openModal, isPageVisible,myPage } = useEmployee()

</script>