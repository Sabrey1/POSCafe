import axios from 'axios';
import { onMounted,ref } from 'vue';
import { modalController } from '@ionic/vue';
import productAdd from '@/views/Product/components/productAdd.vue'
import productEdit from "@/views/Product/components/productEdit.vue"

export function useProduct() {
const data = ref();
async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/product')
    if(res.data){
        data.value = res.data
    }
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this product?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/product/${id}`);
      if (deleteRes.data.success) {
        alert(t("Product deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete poduct"));
    }
  }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: productEdit,
         componentProps: { id },
        cssClass: 'product-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: productAdd,
    cssClass: 'product-modal',
  });
  await modal.present();
};

onMounted(() => {
    getData();
});

    return {
         data,
         onDelete,
         onEdit,
         openModal
    }
}