<template>
    <ion-page>
        <ToolBar>{{(t("User Info"))}}</ToolBar>
    <ion-content>
        <div class="fix-container">
            <ion-card>
                <ion-card-header>
                     {{ userData }}
                    <ion-card-title class="text-center">User Profile</ion-card-title>
                </ion-card-header>
                <ion-card-content>
                    <ion-grid>
                        <ion-row>
                            <ion-col>
                                <ion-label>{{ t("Name") }}: </ion-label>
                                <ion-label>{{ userData.name }}</ion-label>
                            </ion-col>
                            <ion-col>
                                <ion-label>{{ t("Email") }}: </ion-label>
                                <ion-label>{{ userData.email }}</ion-label>
                            </ion-col>
                        </ion-row>
                        <ion-row>
                            <ion-col>
                                <ion-label>{{ t("Role") }}: </ion-label>
                                <ion-label>{{ userData.role_id }}</ion-label>
                            </ion-col>
                            <ion-col>
                                <ion-label>{{ t("Date") }}: </ion-label>
                                <ion-label>{{ dayjs(userData.created_at).format("DD/MM/YYYY") }}</ion-label>
                            </ion-col>
                        </ion-row>
                    </ion-grid>
                </ion-card-content>
            </ion-card>
        </div> 
    </ion-content>
</ion-page>
    
</template>
<script setup>
import dayjs from "dayjs"; 
import ToolBar from "@/views/Layout/ToolBar.vue"

const userData = JSON.parse(localStorage.getItem("user"));

const t = window.t
</script>