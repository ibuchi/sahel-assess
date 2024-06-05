<script setup>
import { ref, watch } from "vue";
import { useCountry } from './../composables/useCountry';
import { useCompany } from './../composables/useCompany';
const props = defineProps(['openModal2', 'data', 'type'])
const emit = defineEmits(['check2', 'submitForm']);
const photo = ref(null)

const {
    getCountry,
    countries,
} = useCountry()

const {
    companies,
    createCompany,
    getCompanies,
    updateCompany,
    deleteComapany,
} = useCompany();

const myPropValue = ref(props.openModal2);

const formData = ref({
    user_id: '',
    country_id: '',
    company_id: '',
    name: '',
    email: '',
    password: '',
    photo: '',
    phone: '',
    address: '',
});

watch(() => props.openModal2, (newValue, oldValue) => {

    if (props.type === 'profile') {
        // formData.value.name = props.data.data.name;
        formData.value.phone = props.data.data.phone
        formData.value.email = props.data.data.email
        formData.value.address = props.data.data.address
        formData.value.photo = photo.value

    } else {
        formData.value.user_id = props.data.data.id;
        formData.value.country_id = props.data.data.country_id;
    }
});



const submitForm = () => {
    if (formData.value.name !== '') {
        emit('submitForm', formData.value)
        console.log( formData.value);
    }


};

const handleClick = () => {
    emit('check2');
};

const handleFileChange = (event) => {
    photo.value = event.target.files[0];
    // console.log(formData.value);
};



</script>
<template>
    <!-- Main modal -->

    <div id="edit-modal" v-show="props?.openModal2"
        class=" bg-gray- bg-opacity-20  overflow-y-auto overflow-x-hidden fixed  flex top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">

        <div class="relative p-4 w-full  max-w-md max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-green-900 rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-white ">
                    </h3>
                    <button type="button" @click="handleClick"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" @submit.prevent="submitForm">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-white "
                                v-if="props?.type == 'company'">Company's name</label>
                            <label for="name" class="block mb-2 text-sm font-medium text-white "
                                v-else-if="props?.type == 'profile'">Your Name
                            </label>
                            <label for="name" class="block mb-2 text-sm font-medium text-white " v-else>Service
                                Name</label>

                            <input type="text" v-model="formData.name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                :placeholder="props.data.data?.name" />
                        </div>
                        <div v-if="props.type === 'company'">
                            <label for="email" class="block mb-2 text-sm font-medium text-white ">Company's
                                Email</label>
                            <input type="email" v-model="formData.email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-200 block w-full p-2.5 "
                                placeholder="company@example.com" />
                        </div>

                        <div v-if="props.type === 'profile'">
                            <div class="flex items-center justify-between">
                                <label for="password" class="input-label">Password</label>
                            </div>
                            <div class="mt-2">
                                <input v-model="formData.password" type="password" autocomplete="current-password"
                                    placeholder="********" class="form-control">
                            </div>
                        </div>

                        <div v-if="props.type === 'service'">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-white ">Select
                                an
                                option</label>
                            <select id="countries" v-model="formData.company_id"
                                class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   ">
                                <option selected disabled>Select Company</option>
                                <option v-for="company in companies.data " :value="company.id">{{ company.name }}
                                </option>

                            </select>
                        </div>

                        <div v-if="props.type === 'profile'">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-white ">Select
                                an
                                option</label>
                            <select id="countries" v-model="formData.country_id"
                                class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   ">
                                <option selected disabled>United States</option>
                                <option v-for="country in countries.data " :value="country.id">{{ country.name }}
                                </option>

                            </select>
                        </div>

                        <div v-if="props.type === 'profile'">
                            <div class="flex items-center justify-between">
                                <label for="phoneNumber" class="input-label">Phone NUmber</label>
                            </div>
                            <div class="mt-2">
                                <input v-model="formData.phone" type="number" autocomplete="current-phoneNumber"
                                    placeholder="090389902222" class="form-control">
                            </div>
                        </div>
                        <div v-if="props.type === 'profile'">
                            <div class="flex items-center justify-between">
                                <label for="address" class="input-label">Address</label>
                            </div>
                            <div class="mt-2">
                                <input v-model="formData.address" type="text" autocomplete="current-address"
                                    placeholder="10 Colh RD. EN " class="form-control">
                            </div>
                        </div>
                        <div v-if="props.type === 'profile'">
                            <div class="flex items-center justify-between">
                                <label for="address" class="input-label">Profile</label>
                            </div>
                            <div class="mt-2">
                                <input @change="handleFileChange" type="file" autocomplete="current-address"
                                    class="form-control">
                            </div>
                        </div>

                        
                        <button type="submit" @click="handleClick" v-if="props.type === 'service' && formData.company_id !== '' && formData.name !== ''"
                        class="w-full text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create</button>
                        <button type="submit" @click="handleClick" v-else-if="props.type === 'profile' || props.type === 'company'"
                            class="w-full text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create</button>


                    </form>
                </div>
            </div>
        </div>
    </div>


</template>


<style lang="scss" scoped></style>