<template>
  <ion-item>
    <ion-label position="floating">{{ placeholder }}</ion-label>
    <ion-input 
      :value="modelValue" 
      @ionInput="onInput"
    ></ion-input>
  </ion-item>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
  modelValue: String,
  placeholder: { type: String, default: 'Search' }
});

const emits = defineEmits(['update:modelValue', 'search']);

// Ionic emits 'ionInput' event instead of native 'input'
function onInput(event: any) {
  const value = event.target.value;
  emits('update:modelValue', value);
  emits('search', value);
}
</script>
