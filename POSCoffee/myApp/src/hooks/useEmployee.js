import axios from 'axios';
import { ref, onMounted ,nextTick} from 'vue'
import { modalController } from '@ionic/vue';
import EmployeeAdd from "@/views/Employee/components/EmployeeAdd.vue"
import EditEmployee from "@/views/Employee/components/EditEmployee.vue"


export function useEmployee() {

const data = ref()


const myPage = ref(null)
const isPageVisible = ref(false)
 

async function getData(){
    const res = await axios.get('http://127.0.0.1:8000/api/employee')
    if(res.data){
        data.value = res.data
        console.log(data.value);
    }
}

async function onDelete(id) {
  const confirmDelete = window.confirm(t("Are you sure you want to delete this employee?"));
  if (confirmDelete) {
    try {
      const deleteRes = await axios.delete(`http://127.0.0.1:8000/api/employee/${id}`);
      if (deleteRes.data.success) {
        alert(t("Employee deleted successfully"));
        await getData();
      }
    } catch (error) {
      console.error(error);
      alert(t("Failed to delete employee"));
    }
  }
}

async function onEdit(id){
    const modal = await modalController.create({
        component: EditEmployee,
         componentProps: { id },
        cssClass: 'employee-modal',
    });
    await modal.present();
}

const openModal = async () => {
  const modal = await modalController.create({
    component: EmployeeAdd,
    cssClass: 'employee-modal',
  });
  await modal.present();
};

onMounted(() => {
    getData()
     isPageVisible.value = true

  nextTick(() => {
    const el = myPage.value?.$el || myPage.value
    if (el && el.classList) {
      el.classList.add('my-active-class')
    }
  })
})

    return {
        data,
        onDelete,
        onEdit,
        openModal,
        isPageVisible,
        myPage
    }
}