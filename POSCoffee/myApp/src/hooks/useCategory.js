import { onMounted, ref } from 'vue';
import { IonFabButton, IonIcon,modalController } from '@ionic/vue';
import categoryAdd from '@/views/Category/components/categoryAdd.vue'
import CategoryEdit from "@/views/Category/components/CategoryEdit.vue"

import app from '@/services/api-service.js';

export function useCategory() {
    
const data = ref();

async function getdata(){
  const res = await app.getApi('category');
  data.value = res;
}

async function onEdit(id){
    const modal = await modalController.create({
        component: CategoryEdit,
         componentProps: { id },
        cssClass: 'category-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this category?"));
  if (confirmDelete) {
    try {
      const deleteRes = await app.deleteApi(`category/${id}`);
      if (deleteRes.data.success) {
        alert(t("Category deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete category"));
    }
  }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: categoryAdd,
    cssClass: 'category-modal',
  });
  await modal.present();
};

  onMounted(()=>{
      getdata();
  })
  
  return {
    data,
    onEdit,
    openModal,
    onDelete
  }
}