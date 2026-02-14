import axios from 'axios';
import { onMounted, ref } from 'vue';
import { modalController } from '@ionic/vue';
import positionAdd from '@/views/Position/components/positionAdd.vue'
import positionEdit from "@/views/Position/components/positionEdit.vue"
export function usePosition() {

const data = ref();

async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/position');
    if(res.data){
        data.value = res.data;
    }
}


async function onEdit(id){
    const modal = await modalController.create({
        component: positionEdit,
         componentProps: { id },
        cssClass: 'position-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this position?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/position/${id}`);
      if (deleteRes.data.success) {
        alert(t("Position deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete position"));
    }
  }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: positionAdd,
    cssClass: 'position-modal',
  });
  await modal.present();
};


onMounted(()=>{
    getdata();
});
 

    return {
        data,
        onDelete,
        onEdit,
        openModal
    }
}