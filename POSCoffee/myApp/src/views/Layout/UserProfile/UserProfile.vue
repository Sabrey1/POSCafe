<template>
 <ion-avatar id="popover-button">
    <img alt="Silhouette of a person's head" src="https://ionicframework.com/docs/img/demos/avatar.svg" />
  </ion-avatar>
  <ion-popover trigger="popover-button" :dismiss-on-select="true" class="full-width-popover">
    <ion-content>
      <ion-list>
        <ion-item :button="true" :detail="false">
            <div>
                <i class="fas fa-user"></i>
            {{ t("User Profile") }}
            </div>
        </ion-item>
         <ion-item :button="true" :detail="false" class="language-item">
            <div class="language-wrapper">
              <i class="fas fa-language"></i>
              <Translate class="translate-component"/>
            </div>
        </ion-item>
        
        <ion-item :button="true" @click="logout" :detail="false">
            <div>
              <i class="fas fa-sign-out-alt"></i>
              {{ t("Logout") }}
            </div>
        </ion-item>
        
      </ion-list>
    </ion-content>
  </ion-popover>
</template>

<script setup lang="ts">

import Translate from "@/views/Layout/Translate.vue"
const t = window.t

function logout(){
  localStorage.removeItem('user')
  window.location.href = '/login'
}

</script>

<style scoped>
/* Make the popover use full width */
.full-width-popover {
  --width: 250px;
  --min-width: 250px;
}

/* Language item specific styling */
.language-item {
  --padding-start: 0;
  --padding-end: 0;
  --inner-padding-end: 0;
}

.language-wrapper {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  height: 100%;
  padding: 12px 16px;
}

.translate-component {
  flex: 1;
  display: flex;
  align-items: center;
  height: 100%;
}

/* Deep selector to style the button inside Translate component */
.translate-component :deep(button) {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  background: transparent;
  border: none;
  padding: 0;
  text-align: left;
  cursor: pointer;
}
</style>
