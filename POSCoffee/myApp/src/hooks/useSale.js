import {ref, onMounted} from 'vue'
import axios from 'axios'
const saleDoc = ref({})

export function useSale() {

    async function getSaleData(){
        const res = await axios.get('http://127.0.0.1:8000/api/order/create');
        if(res.data){
            saleDoc.value = res.data
        }
    }
    
    onMounted(() => {
        getSaleData()
    })

    return {
        saleDoc
    }
}