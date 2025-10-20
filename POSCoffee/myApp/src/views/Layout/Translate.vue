<template>
    <div>
      <button @click="switchLang" class="btnChange">{{ t("Change Language")}}</button>
  </div>

</template>
<script setup lang="ts">
const t = window.t
const { locale } = useI18n()
import { useI18n } from 'vue-i18n'
function switchLang() {
  const current = localStorage.getItem('locale')
  const next = current === 'km' ? 'en' : 'km'
  window.setLocale(next)
}   
</script>


 <style scoped>
.btnChange {
  width: 100%;
  height: 100%;
  background-color: transparent;
  border: none;
  text-align: left;
  font-size: 16px;
  cursor: pointer;
}
</style>