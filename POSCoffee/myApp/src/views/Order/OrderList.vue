<template>
    <ion-page>
        <AppBar>{{(t("Sale List"))}}</AppBar>
    <ion-content>
        Sale List
        {{ data }}
    </ion-content>
</ion-page>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue"
import axios from "axios"
import AppBar from "@/views/Layout/AppBar.vue"
const t = window.t
const data = ref()

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/order');
    if(res.data){
        data.value = res.data
    }
}

onMounted(() => {
    getData()
})

</script>