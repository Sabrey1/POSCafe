<template>
    <ion-page>
        <ToolBar>{{(t("Close Cashier Shift"))}}</ToolBar>
    <ion-content>
        <div class="p-2 fix-container">
            <ion-grid>
                <ion-row>
                    <ion-col>
                        <ion-input
                            :label="t('Working Day Number')"
                            label-placement="floating"
                            fill="outline"
                            :placeholder="t('Enter Working Day Number')"
                        />
                    </ion-col>
                    <ion-col>
                        <ion-input
                            :label="t('Working Date')"
                            label-placement="floating"
                            type="date"
                            fill="outline"
                            :placeholder="t('Select Working Day')"
                        />
                    </ion-col>
                </ion-row>
                <ion-row>
                    <ion-col>
                        <ion-input
                            :label="t('POS Profile')"
                            label-placement="floating"
                            fill="outline"
                            :placeholder="t('Enter POS Profile')"
                        />
                    </ion-col>
                    <ion-col>
                        <ion-input
                            :label="t('Shift')"
                            label-placement="floating"
                            type="date"
                            fill="outline"
                            :placeholder="t('Select Shift')"
                        />
                    </ion-col>
                </ion-row>
                
                <h3>{{t("Cash Float")}}</h3>

                <ion-row>
                    <ion-col>
                        <ion-input
                            :label="t('Cash Dollar')"
                            label-placement="floating"
                            fill="outline"
                            :placeholder="t('Enter Cash Dollar')"
                        />
                    </ion-col>
                    <ion-col>
                        <ion-input
                            :label="t('Cash Riel')"
                            label-placement="floating"
                            fill="outline"
                            :placeholder="t('Enter Cash Riel')"
                        />
                    </ion-col>
                </ion-row>

                <h3>{{t("Total Cash Float:")}} $30.00</h3>

                <ion-row>
                    <ion-col>
                       <ion-input
                :label="t('Note')"
                label-placement="floating"
                type="text"
                fill="outline"
                :placeholder="t('Enter Note')"
                style="height: 100px;"
                ></ion-input>
                    </ion-col>
                </ion-row>
            </ion-grid>
        </div>
        <FooterShift class="footer" />
    </ion-content>
</ion-page>

</template>

<script setup lang="ts">
import ToolBar from "@/views/Layout/ToolBar.vue"
import FooterShift from "@/views/Shift/components/FooterShift.vue"

const t = window.t
</script>

<style scoped>
.footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  background-color: var(--ion-background-color, #ffffff);
  box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
}
</style>