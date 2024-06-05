import { onMounted, ref } from "vue";
import { http } from "../utils/request";

export function useProfile() {
    const profile = ref([]);
    const allData = ref([]);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const getProfile = async () => profile.value = (await http.get('profile')).data;
    const getAllData = async () => { 
        allData.value = (await http.get('all-companies')).data;
    }
  
    const updateProfile = async (formData) => {
        console.log(profile.value.data ,formData);
        (await http.post('profile', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': csrfToken
              }
        })).data
    };
    

    onMounted(() => {
        getProfile();
        getAllData();
    });
    

    return {
        profile,
        getProfile,
        updateProfile,
        allData,
    }


}