import { onMounted, ref } from 'vue';
import axios from 'axios';
import { modalController } from '@ionic/vue';
import CurrencyAdd from '@/views/Currency/components/CurrencyAdd.vue'
import CurrencyEdit from '@/views/Currency/components/CurrencyEdit.vue'

export function useCurrency() {
    

const data = ref()

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/currency');
    if(res.data){
        data.value = res.data;
    }
}
async function onEdit(id){
    const modal = await modalController.create({
        component: CurrencyEdit,
         componentProps: { id },
        cssClass: 'currency-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CurrencyAdd,
    cssClass: 'currency-modal',
  });
  await modal.present();
};

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this currency?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/currency/${id}`);
      if (deleteRes.data.success) {
        alert(t("Currency deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete currency"));
    }
  }
}

onMounted(()=>{
    getdata();
})

    return {
        data,
        onDelete,
        onEdit,
        openModal
    }
}