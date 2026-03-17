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
                 <ion-button color="danger" @click="onCancel">{{ t("Cancel") }}</ion-button>
                 <ion-button color="warning">{{ t("View Working Day") }}</ion-button>
                 <ion-button 
                        color="success" 
                        v-if="!isOpen" 
                        @click="openWorkingDay"
                    >
                        {{ t("Open Working Day") }}
                    </ion-button>

                    <ion-button 
                        color="danger" 
                        v-else 
                        @click="closeWorkingDay"
                    >
                        {{ t("Close Working Day") }}
                    </ion-button>
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
import { useRouter } from 'vue-router';

import api from '@/services/api-service.js'

const isOpen = ref(false)
const router = useRouter();
const workingDay = ref({
    name:'test0,',
    opening_date:"",
    note: "",
}) 

const workingday = ref(dayjs().format('YYYY-MM-DD'))


function onCancel(){
    router.push('/home');
}
async function openWorkingDay() {
    try {
        await api.post('workingday', {
            name: "Working Day " + workingday.value,
            opening_date: workingday.value,
            note: workingDay.value.note
        })

        isOpen.value = true 

    } catch (error) {
        console.log(error)
        alert(error.response?.data?.message || "Error")
    }  
}
async function closeWorkingDay() {
    try {
        // ✅ get current open working day
        const res = await api.get('workingday/current')

        if (!res.data) {
            alert("No working day open")
            return
        }

        await api.put(`workingday/${res.data.id}`, {
            close_date: dayjs().format('YYYY-MM-DD')
        })

        isOpen.value = false

    } catch (error) {
        console.error(error)
    }
}
import { onMounted } from 'vue';

onMounted(async () => {
    try {
        const res = await api.get('workingday/current');

        if(res.data) {
            isOpen.value = true;
            workingDay.note = res.data.note || '';
            workingday.value = res.data.opening_date;
        } else {
            isOpen.value = false;
        }

    } catch (error) {
        console.error(error);
    }
});
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