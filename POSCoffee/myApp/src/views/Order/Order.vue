<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>{{ t("Sale") }}</ion-title>
      </ion-toolbar>
    </ion-header>

    <!-- Main content area -->
    <ion-content>
      <ion-split-pane when="xs" content-id="main">
        <ion-menu content-id="main">
          <ion-content class="ion-padding">
            Menu Content is 350px wide and has a blue dashed border


            <ion-footer class="footer">
            <ion-toolbar color="tertiary">
            <ion-title>Footer</ion-title>
            </ion-toolbar>
        </ion-footer>
          </ion-content>
        </ion-menu>

        <div class="ion-page" id="main">
          <ion-content>
            <div class="customerSelected">
              <SelectCustomer />
            </div>

            <ion-list class="center-list">
            <ion-item lines="none">
                <ion-icon :icon="cartOutline" ></ion-icon>
                <ion-label class="center-label">{{ t("No items selected") }}</ion-label>
            </ion-item>
            </ion-list>

            <div class="btnpayment">
                <FooterPayment />
            </div>
          </ion-content>
        </div>
      </ion-split-pane>
       
    
    </ion-content>

  </ion-page>
</template>

<script setup lang="ts">
import SelectCustomer from "@/views/Order/components/SelectCustomer.vue";
import FooterPayment from "@/views/Order/components/FooterPayment.vue";
import { IonCard, IonCardContent, IonCardHeader, IonCardSubtitle, IonCardTitle,IonIcon  , IonSale } from '@ionic/vue';
import { logoIonic, giftOutline, settingsOutline, cartOutline, arrowForwardOutline, alarmOutline, personOutline, timeOutline, priceTagOutline, readerOutline, peopleOutline, barChartOutline }  from 'ionicons/icons';
const t = window.t;
</script>

<style scoped>
ion-split-pane {
  --side-width: 1100px;
  --side-max-width: 1100px;
  --border: 1px dashed #b3baff;
}

.btnpayment {
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 70px;
  background: #fff;
}

.footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    left: 0;
}

.center-list {
  width: 100%;
  
}

.center-item {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
</style>
