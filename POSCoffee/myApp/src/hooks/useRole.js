import axios from 'axios';
import { onMounted, ref } from 'vue';
import { modalController } from '@ionic/vue';
import roleAdd from '@/views/Role/components/roleAdd.vue'
import RoleEdit from "@/views/Role/components/RoleEdit.vue"


export function useRole() {

const data = ref();
async function getdata(){
    const res = await axios.get('http://127.0.0.1:8000/api/role');
    if(res.data){
        data.value = res.data;
    }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: RoleEdit,
         componentProps: { id },
        cssClass: 'role-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this role?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/role/${id}`);
      if (deleteRes.data.success) {
        alert(t("Role deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete role"));
    }
  }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: roleAdd,
    cssClass: 'role-modal',
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