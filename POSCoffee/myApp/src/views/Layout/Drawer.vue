<template>
 <div>
  <ion-list>
    <RouterLink to="/home" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-home" style="margin-right: 10px;"></i>
      <ion-label>{{t("Home")}}</ion-label>
    </ion-item>
    </RouterLink>
    <ion-item>
        <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i>
      <ion-label>{{t("Dashboard")}}</ion-label>
    </ion-item>
    
    <ion-item>
        <i class="fas fa-chart-line" style="margin-right: 10px;"></i>
      <ion-label>{{t("Sale")}}</ion-label>
    </ion-item>
    <RouterLink to="/customer-list" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-user" style="margin-right: 10px;"></i>
      <ion-label>{{t("Customer")}}</ion-label>
    </ion-item>
    </RouterLink>
    <RouterLink to="/employee-list" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-users" style="margin-right: 10px;"></i>
      <ion-label>{{t("Employee")}}</ion-label>
    </ion-item>
    </RouterLink>
    <ion-item>
        <i class="fas fa-users" style="margin-right: 10px;"></i>
      <ion-label>{{t("Role")}}</ion-label>
    </ion-item>
    <ion-item>
        <i class="fas fa-users" style="margin-right: 10px;"></i>
      <ion-label>{{t("Position")}}</ion-label>
    </ion-item>
    <ion-item>
        <i class="fas fa-file" style="margin-right: 10px;"></i>
      <ion-label>{{t("Report")}}</ion-label>
    </ion-item>
    <ion-item>
        <i class="fas fa-cogs" style="margin-right: 10px;"></i>
      <ion-label>{{t("Settings")}}</ion-label>
    </ion-item>
    <ion-item>
        <i class="fas fa-sign-out-alt" style="margin-right: 10px; color: red;"></i>
      <ion-label class="text-red-500">{{t("Logout")}}</ion-label>
    </ion-item>
  </ion-list>
 </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';

const t = window.t
</script>