<script setup>
import { computed, onMounted, ref, watch } from "vue";
import { http } from "../utils/request";
import { useCompany } from './../composables/useCompany';
import { useProfile } from './../composables/useProfile';
import Modal from './Modal.vue';
import CreateModal from './CreateModal.vue';

const openModal = ref(false);
const openModal2 = ref(false);
const selectedCompany = ref(null);
const toggleModal = () => {
    openModal.value = false;
}
const toggleModal2 = () => {
    openModal2.value = false;
}
const selectCompany = (company) => {
    selectedCompany.value = company
}


const {
    companies,
    createCompany,
    getCompanies,
    updateCompany,
    deleteComapany,
} = useCompany();

const {
    profile,
} = useProfile()

const isServicesEmpty = computed(() => {
    return companies.value.length === 0;
});

</script>

<template>
    <Modal :openModal="openModal" :type="'company'" :data="selectedCompany" @check="toggleModal"
        @submitForm="updateCompany" />
    <CreateModal :openModal2="openModal2" :type="'company'" :data="profile" @check2="toggleModal2"
        @submitForm="createCompany" />
    <div class="flex  flex-col justify-center px-6 py-12 lg:px-8 w-full ">
        <div class="flex justify-between">
            <h1 class="text-gray-700 font-bold text-2xl">Company</h1>
            <button :disabled="isServicesEmpty" @click="openModal2 = true" type="button"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">+
                Create company</button>
        </div>
        <div class="text-gray-400">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, ut iste animi error voluptatum
            similique laudantium est accusamus
        </div>
        <div v-if="companies.data?.length !== 0"
            class="grid grid-cols-1 md:grid-cols-4 gap-5 px-4 mt-8  sm:px-8 bg-gray-50 rounded-xl shadow-md "
            style="padding: 20px;">
            <div v-for="company in companies.data" class="bg-white rounded-xl hover:shadow-2xl p-4 shadow-xl mt-4">
                <div class="flex flex-col justify-center items-center">
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/upload-social-media-post-4291893-3569926.png"
                        class="w-auto h-40 rounded-lg" />
                    <p class="font-semibold text-xl mt-1">{{ company?.name }}</p>
                    <p class="font-semibold text-sm text-gray-400 text-center">{{ company?.email }}<br> {{
                        company?.created_at }}</p>
                    <div class="space-x-4">
                        <button @click="openModal = true, selectCompany(company)"
                            class=" mt-4 bg-green-600 hover:bg-green-700 shadow-xl text-xs text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button>
                        <button @click="deleteComapany(company.id)"
                            class=" mt-4 bg-red-600 hover:bg-red-700 shadow-xl text-xs text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div v-else class="flex items-center justify-center bg-gray-100  rounded-lg pt-10 pb-10">
            <div class="w-80 ">
                <img src="../images/undraw_no_data_re_kwbl.svg" alt="" class="">
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped></style>
