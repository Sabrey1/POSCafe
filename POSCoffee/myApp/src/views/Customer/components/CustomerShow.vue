<!-- <template>
    <div>

        <Button label="Show" @click="visible = true" class="p-button-text p-1 text-lg" style="border: green 2px solid;" />

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

</script> -->

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
      :header="t('Customer Detail')"
      :style="{ width: '56rem' }"
    >
      <div v-if="customer" class="flex flex-column gap-4">

        <!-- 🔷 Centered Gradient Header -->
        <div
          class="p-4 border-round-xl shadow-3 text-white flex flex-column align-items-center text-center gap-3"
          style="background: linear-gradient(135deg, #4f46e5, #9333ea);"
        >

          <!-- Avatar -->
          <div>
            <!-- If image exists -->
            <img
              v-if="customer.image"
              :src="customer.image"
              class="w-7rem h-7rem border-circle shadow-4 border-2"
              style="object-fit: cover; border-color: rgba(255,255,255,0.4);"
            />

            <!-- If no image -->
            <div
              v-else
              class="w-7rem h-7rem border-circle flex align-items-center justify-content-center text-3xl font-bold shadow-4"
              style="background-color: rgba(255,255,255,0.25);"
            >
              {{ customer.name?.charAt(0).toUpperCase() }}
            </div>
          </div>

          <!-- Name -->
          <div class="text-2xl font-bold">
            {{ customer.name }}
          </div>
          
          <Tag
            :value="customer.status"
            :severity="statusSeverity"
            class="text-sm"
          />

        </div>

        <!-- 🔷 Info Grid -->
        <div class="grid">

          <div class="col-12 md:col-6">
            <div class="p-3 border-round-lg surface-100 shadow-1">
              <div class="text-sm text-500 mb-1">Email</div>
              <div class="font-medium text-900">
                {{ customer.email }}
              </div>
            </div>
          </div>

          <div class="col-12 md:col-6">
            <div class="p-3 border-round-lg surface-100 shadow-1">
              <div class="text-sm text-500 mb-1">Phone</div>
              <div class="font-medium text-900">
                {{ customer.phone }}
              </div>
            </div>
          </div>

          <div class="col-12 md:col-4">
            <div class="p-3 border-round-lg bg-blue-50">
              <div class="text-sm text-blue-500 mb-1">Gender</div>
              <div class="font-medium text-blue-900">
                {{ customer.gender }}
              </div>
            </div>
          </div>

          <div class="col-12 md:col-4">
            <div class="p-3 border-round-lg bg-green-50">
              <div class="text-sm text-green-500 mb-1">Customer Type</div>
              <div class="font-medium text-green-900">
                {{ customer.customer_type }}
              </div>
            </div>
          </div>

          <div class="col-12 md:col-4">
            <div class="p-3 border-round-lg bg-purple-50">
              <div class="text-sm text-purple-500 mb-1">Country</div>
              <div class="font-medium text-purple-900">
                {{ customer.country }}
              </div>
            </div>
          </div>

        

        </div>

        <!-- 🔷 Address -->
        <div class="p-3 border-round-lg surface-100 shadow-1">
          <div class="text-sm text-500 mb-1">Address</div>
          <div class="font-medium">
            {{ customer.address }}
          </div>
        </div>

        <!-- 🔷 Note -->
        <div class="p-3 border-round-lg surface-100 shadow-1">
          <div class="text-sm text-500 mb-1">Note</div>
          <div class="font-medium">
            {{ customer.note }}
          </div>
        </div>

        <!-- 🔷 Footer -->
        <div class="flex justify-content-between text-sm text-500 pt-3 border-top-1 surface-border">
          <div>Created: {{ dayjs(customer.created_at).format("DD/MM/YYYY") }}</div>
          <div>Updated: {{ dayjs(customer.updated_at).format("DD/MM/YYYY") }}</div>
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
  customer: Object
})
 
const statusSeverity = computed(() => {
  const status = props.customer?.status?.toLowerCase()
  if (status === 'active') return 'success'
  if (status === 'inactive') return 'danger'
  if (status === 'pending') return 'warning'
  return 'info'
})
</script>