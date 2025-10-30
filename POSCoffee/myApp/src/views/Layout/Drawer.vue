<template>
 <div>
  <ion-list>
  
    <RouterLink to="/home" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-home" style="margin-right: 10px;"></i>
      <ion-label>{{t("Home")}}</ion-label>
    </ion-item>
    </RouterLink>
    <RouterLink to="/dashboard" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i>
      <ion-label>{{t("Dashboard")}}</ion-label>
    </ion-item>
    </RouterLink>

    <RouterLink to="/order" style="text-decoration: none;">
      <ion-item>
          <i class="fas fa-chart-line" style="margin-right: 10px;"></i>
        <ion-label>{{t("Sale")}}</ion-label>
      </ion-item>
    </RouterLink>
    <RouterLink to="/category" style="text-decoration: none;">
      <ion-item>
           <i class="fa-solid fa-layer-group" style="margin-right: 10px;"></i>
        <ion-label>{{t("Category")}}</ion-label>
      </ion-item>
    </RouterLink>

    <RouterLink to="/product" style="text-decoration: none;">
      <ion-item>
          <i class="far fa-window-maximize" style="margin-right: 10px;"></i>
        <ion-label>{{t("Product")}}</ion-label>
      </ion-item>
    </RouterLink>
    <RouterLink to="/working-day" style="text-decoration: none;">
      <ion-item>
         <i class="fa-regular fa-clock" style="margin-right: 10px;"></i> 
        <ion-label>{{t("Working Day")}}</ion-label>
      </ion-item>
    </RouterLink>
    <RouterLink to="/shift" style="text-decoration: none;">
      <ion-item>
          <i class="fa-regular fa-clock" style="margin-right: 10px;"></i>
        <ion-label>{{t("Shift")}}</ion-label>
      </ion-item>
    </RouterLink>

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
    <RouterLink to="/role-list" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-users" style="margin-right: 10px;"></i>
      <ion-label>{{t("Role")}}</ion-label>
    </ion-item>
    </RouterLink>
    <RouterLink to="/position-list" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-users" style="margin-right: 10px;"></i>
      <ion-label>{{t("Position")}}</ion-label>
    </ion-item>
    </RouterLink>
    <RouterLink to="/report" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-file" style="margin-right: 10px;"></i>
      <ion-label>{{t("Report")}}</ion-label>
    </ion-item>
    </RouterLink>
    <RouterLink to="/setting" style="text-decoration: none;">
    <ion-item>
        <i class="fas fa-cogs" style="margin-right: 10px;"></i>
      <ion-label>{{t("Settings")}}</ion-label>
    </ion-item>
    </RouterLink>
    <ion-item @click="logout">
        <i class="fas fa-sign-out-alt" style="margin-right: 10px; color: red;"></i>
      <ion-label class="text-red-500">{{t("Logout")}}</ion-label>
    </ion-item>
  </ion-list>
 </div>
</template>

<script setup>
import { RouterLink } from 'vue-router';

// import { logoIonic, giftOutline, settingsOutline, cartOutline, arrowForwardOutline, alarmOutline, personOutline, timeOutline, priceTagOutline, readerOutline, peopleOutline, barChartOutline } from 'ionicons/icons';

const t = window.t

function logout() {
  localStorage.removeItem('user')
  window.location.href = '/login'
}
</script>