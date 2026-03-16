<template>
<IonPage>
    <IonContent> 
        <ToolBar>{{(t("Start Working Day"))}}</ToolBar> 
    
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
                            v-model="workingday"
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
         
    </IonContent>
    <ion-footer>
        <ion-toolbar>
            <ion-title class="ion-text-center">
                 <ion-button color="danger">{{ t("Cancel") }}</ion-button>
                 <ion-button color="warning">{{ t("View Working Day") }}</ion-button>
                 <ion-button color="success" @click="openWorkingDay">{{ t("Open Working Day") }}</ion-button>
            </ion-title>
        </ion-toolbar>
    </ion-footer>
</IonPage>
</template>

<script setup>
import { ref } from "vue";
import { IonContent } from "@ionic/vue";
import dayjs from 'dayjs'
const t = window.t

const workingDay = ref({
    name: "",
    date:"",
    note: "",
}) 

const workingday = ref(dayjs().format('YYYY-MM-DD'))

function openWorkingDay() {
    alert("Open Working Day");
}
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