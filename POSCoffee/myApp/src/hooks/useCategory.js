import { onMounted, ref } from 'vue';
import axios from 'axios';
import { IonFabButton, IonIcon,modalController } from '@ionic/vue';
import categoryAdd from '@/views/Category/components/categoryAdd.vue'
import CategoryEdit from "@/views/Category/components/CategoryEdit.vue"

export function useCategory() {
    
const data = ref();

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/category');
    if(res.data){
        data.value = res.data;
    }
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
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/category/${id}`);
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