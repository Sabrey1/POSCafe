<template>
    <ion-page>
        <ion-header>
        <ion-toolbar>
            <ion-title>{{ t("Product") }}</ion-title>
        </ion-toolbar>
        </ion-header>
        <ion-content class="ion-padding">
        {{ data }}
        ss
        </ion-content>
    </ion-page>
</template>

<script setup lang="ts">
import { onMounted,ref } from 'vue';

const t = window.t

const data = ref();
async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/product')
    if(res.data){
        data.value = res.data
    }
}

onMounted(() => {
    getData();
});
</script>