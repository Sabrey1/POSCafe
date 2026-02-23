<template>
    <div>

        <Button label="Show" @click="visible = true" />

        <Dialog v-model:visible="visible" :draggable="false" modal :header="t('Customer Detail')" :style="{ width: '45rem' }">
            {{ customer }}
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";  

const t = window.t

const visible = ref(false);


const props = defineProps({
    customer: Object
})

</script>