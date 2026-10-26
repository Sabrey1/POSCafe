import axios from "axios"; 
import { onMounted, ref } from "vue";
import { IonFabButton, IonIcon,modalController ,IonBackButton } from '@ionic/vue';
import CreateUser from "@/views/Auth/User/components/CreateUser.vue"

import EditUser from '@/views/Auth/User/components/EditUser.vue'
import app from '@/services/api-service.js';

export function useUser() {
    
const data = ref();

async function getData() {
  try {
    data.value = await app.getApi('user');
  } catch (error) {
    console.error('Failed to fetch users:', error);
  }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CreateUser,
    cssClass: 'user-modal',
  });
  await modal.present();
};



async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this user?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/user/${id}`);
      if (deleteRes.data.success) {
        alert(t("User deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete user"));
    }
  }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: EditUser,
         componentProps: { id },
        cssClass: 'user-modal',
    });
    await modal.present();
}


onMounted(() => {
    getData()
})

    return {
        data,
        onDelete,
        onEdit,
        openModal
    }
}