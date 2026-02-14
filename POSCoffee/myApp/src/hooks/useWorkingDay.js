import axios from 'axios';
import WorkingDayEdit from '@/views/WorkingDay/components/WorkingDayEdit.vue'
import { modalController } from '@ionic/vue';
import { onMounted, ref } from 'vue'

export function useWorkingDay() {

const data = ref()

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/workingday');
    if(res.data){
        data.value = res.data
    }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: WorkingDayEdit,
         componentProps: { id },
        cssClass: 'workingday-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this working day?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/workingday/${id}`);
      if (deleteRes.data.success) {
        alert(t("workingday deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete workingday"));
    }
  }
}


onMounted(() => {
    getData();
});



    return {
        data,
        onDelete,
        onEdit
    }
}