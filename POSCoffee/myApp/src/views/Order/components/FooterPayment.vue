<template>
    <div>
        <ion-chip color="primary"> {{ t("Exchange Rate") }} : {{ main }}៛ = {{ second }}$</ion-chip>
        <ion-label class="text-center">{{ t("Payment") }} : {{ payment }}</ion-label>
        
    </div>          
</template>

<script setup lang="ts">
import { ref } from 'vue'
const t = window.t

const payment = ref(20000)
const main = ref(4000)
const second = ref(1)
const exchangeRate = ref(20000)
</script>