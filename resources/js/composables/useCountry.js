import { onMounted, ref } from "vue";
import { http } from "../utils/request";

export function useCountry() {
    const countries = ref([]);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const getCountry = async () => {
        countries.value = (await http.get('countries')).data;
    }
    
    
    onMounted(() => {
        getCountry();
    });
    

    return {
        getCountry,
        countries,
    }


}