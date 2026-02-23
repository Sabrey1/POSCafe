import { ref, onMounted } from "vue";
import axios from "axios";
import { modalController  } from '@ionic/vue';
import CustomerEdit from "@/views/Customer/components/CustomerEdit.vue"
import CustomerAdd from "@/views/Customer/components/CustomerAdd.vue"

export function useCustomer() {

const data = ref([])

async function getdata (){
    const res = await axios.get('http://127.0.0.1:8000/api/customer')
    if (res.data){
        data.value = res.data;
    }
}

function OnSearch(){

}

async function onEdit(id){
    const modal = await modalController.create({
        component: CustomerEdit,
         componentProps: { id },
        cssClass: 'custom-modal',
    });
    await modal.present();
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this customer?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/customer/${id}`);
      if (deleteRes.data.success) {
        alert(t("Customer deleted successfully"));
        await getdata();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete customer"));
    }
  }
}

const openModal = async () => {
  const modal = await modalController.create({
    component: CustomerAdd,
    cssClass: 'custom-modal',
  });
  await modal.present();
};


    onMounted(() => {
        getdata();
        
    })

    return {
        data,
        onDelete,
        onEdit,
        openModal
    }
}