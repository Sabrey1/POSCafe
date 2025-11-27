<template>
  <ion-page>
      <ToolBar>{{ t("Sale") }}</ToolBar>

    <!-- Main content area -->
    <ion-content>
      <ion-split-pane when="xs" content-id="main">
        <ion-menu content-id="main">
          <ion-content class="ion-padding">
            <ion-chip>Food</ion-chip>
            <ion-chip>Drink</ion-chip>
            <div class="flex">
              <ion-card v-for="item in saleDoc.product">
                <ion-card-content>
                    {{ item.image }}
                    {{ item.name }}
                    {{ item.price }}
                </ion-card-content>
              </ion-card>
            </div>
               
        <div class="fixed bottom-0 w-full left-0">
            <ion-toolbar color="light">
            <Footer />
            </ion-toolbar>
        </div>
          </ion-content>
        </ion-menu>

        <div class="ion-page" id="main">
          <ion-content>
            <div class="customerSelected">
              <SelectCustomer :saleDoc="saleDoc" />
            </div>

            <ion-list class="text-center">
              <ion-item lines="none">
                  <ion-icon :icon="cartOutline" ></ion-icon>
                  <ion-label class="center-label">{{ t("No items selected") }}</ion-label>
              </ion-item>
            </ion-list>

            <div class="fixed bottom-0 w-full">
            <ion-toolbar color="light">
              <FooterPayment />
            </ion-toolbar>
               
            </div>
          </ion-content>
        </div>
      </ion-split-pane>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import SelectCustomer from "@/views/Order/components/SelectCustomer.vue";
import Footer from '@/views/Order/components/Footer.vue'
import FooterPayment from "@/views/Order/components/FooterPayment.vue";
import {useSale} from '@/hooks/useSale.js'
import { IonCard, IonCardContent, IonIcon   } from '@ionic/vue';
import {  cartOutline }  from 'ionicons/icons';
import ToolBar from "@/views/Layout/ToolBar.vue"

const t = window.t;
const { saleDoc } = useSale();
</script>

<style scoped>
ion-split-pane {
  --side-width: 1100px;
  --side-max-width: 1100px;
  --border: 1px dashed #b3baff;
}
</style>
