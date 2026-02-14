import { onMounted, ref } from 'vue'
import axios from 'axios';
import shiftEdit from '@/views/Shift/components/shiftEdit.vue'
import { modalController  } from '@ionic/vue';

export function useShift() {

const data = ref()

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/shift');
    if(res.data){
        data.value = res.data
    }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: shiftEdit,
         componentProps: { id },
        cssClass: 'shift-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this shift?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/shift/${id}`);
      if (deleteRes.data.success) {
        alert(t("shift deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete shift"));
    }
  }
}

onMounted(() => {
    getData()
})


    return {
      data,
      onDelete,
      onEdit
    }
}
