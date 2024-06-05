import { onMounted, ref } from "vue";
import { http } from "../utils/request";

export function useService() {
    const services = ref([]);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const getService = async () => services.value = (await http.get('services')).data;

    const createService = async (formData) => {
        services.value.data.push(formData)
        await http.post(`services`, formData).data
    };
    const deleteService = async (serviceID) => {
        services.value.data = services.value.data.filter(service => service.id !== serviceID);
        await http.delete(`services/${serviceID}`).data;
    }

    onMounted(() => {
        getService();
    });


    return {
        services,
        getService,
        createService,
        deleteService,
    }

}