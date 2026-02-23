
<template>
  <div>
    <Button
      label="Show"
      @click="visible = true"
      class="p-button-text p-1 text-lg"
      style="border: green 2px solid;"
    />

    <Dialog
      v-model:visible="visible"
      :draggable="false"
      modal
      :header="t('Category Detail')"
      :style="{ width: '56rem' }"
    >
      <div v-if="category" class="flex flex-column gap-4">
         
        <div
          class="p-4 border-round-xl shadow-3 text-white flex flex-column align-items-center text-center gap-3"
          style="background: linear-gradient(135deg, #4f46e5, #9333ea);"
        >

          <!-- Avatar -->
          <div>
            <!-- If image exists -->
            <img
              v-if="category.image"
              :src="category.image"
              class="w-7rem h-7rem border-circle shadow-4 border-2"
              style="object-fit: cover; border-color: rgba(255,255,255,0.4);"
            />

            <!-- If no image -->
            <div
              v-else
              class="w-7rem h-7rem border-circle flex align-items-center justify-content-center text-3xl font-bold shadow-4"
              style="background-color: rgba(255,255,255,0.25);"
            >
              {{ category.name?.charAt(0).toUpperCase() }}
            </div>
          </div>

          <!-- Name -->
          <div class="text-2xl font-bold">
            {{ category.name }}
          </div>
          
        </div>
 
        <!-- 🔷 Note -->
        <div class="p-3 border-round-lg surface-100 shadow-1">
          <div class="text-sm text-500 mb-1">Description</div>
          <div class="font-medium">
            {{ category.description }}
          </div>
        </div>
        <!-- 🔷 Note -->
        <div class="p-3 border-round-lg surface-100 shadow-1">
          <div class="text-sm text-500 mb-1">Note</div>
          <div class="font-medium">
            {{ category.note }}
          </div>
        </div>

        <!-- 🔷 Footer -->
        <div class="flex justify-content-between text-sm text-500 pt-3 border-top-1 surface-border">
          <div>Created: {{ dayjs(category.created_at).format("DD/MM/YYYY") }}</div>
          <div>Updated: {{ dayjs(category.updated_at).format("DD/MM/YYYY") }}</div>
        </div>

      </div>
    </Dialog>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import dayjs from "dayjs";

const t = window.t
const visible = ref(false)

const props = defineProps({
  category: Object
})

 

/* 🔥 Auto change tag color based on status */
const statusSeverity = computed(() => {
  const status = props.customer?.status?.toLowerCase()
  if (status === 'active') return 'success'
  if (status === 'inactive') return 'danger'
  if (status === 'pending') return 'warning'
  return 'info'
})
</script>