<template>
<ion-page>
        <ToolBar>{{(t("Working Day"))}}</ToolBar> 
    <ion-content>
        <div class="p-2 fix-container">
            <ion-grid>
                <ion-row>
                    <ion-col>
                        <ion-input
                            :label="t('Working Day')"
                            label-placement="floating"
                            type="date"
                            fill="outline"
                            :placeholder="t('Select Working Day')"
                        />
                    </ion-col>
                    <ion-col>
                        <ion-input
                            :label="t('POS Profile')"
                            label-placement="floating"
                            fill="outline"
                            :placeholder="t('Enter POS Profile')"
                        />
                    </ion-col>
                </ion-row>
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
        <FooterWorkingDay class="footer" />
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import ToolBar from "@/views/Layout/ToolBar.vue"
import FooterWorkingDay from "@/views/WorkingDay/components/FooterWorkingDay.vue"
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

.ion-content {
  padding-bottom: 80px;
}

.custom-note-input {
  --padding-start: 10px;
  height: 100px;
}
</style>