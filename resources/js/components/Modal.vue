<script setup>
import { ref, watch } from "vue";
const props = defineProps(['openModal', 'data', 'type'])
const emit = defineEmits(['check', 'submitForm']);

const myPropValue = ref(props.data);

const formData = ref({
    id: '',
    user_id: '',
    country_id: '',
    name: '',
    email: '',
});

watch(() => props.data, (newValue, oldValue) => {
    formData.value.email = newValue.email;
    formData.value.name = newValue.name;
    formData.value.id = newValue.id;
    formData.value.user_id = newValue.user_id;
    formData.value.country_id = newValue.country_id;
});


const handleClick = () => {
    emit('check');
};
const submitForm = () => {
    emit('submitForm', formData.value)
};

</script>

<template>
    <!-- Main modal -->
    <div id="edit-modal" v-show="props?.openModal"
        class="  overflow-y-auto overflow-x-hidden fixed flex top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-green-300 rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                    </h3>
                    <button type="button" @click="handleClick"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
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
                            <label for="name" class="block mb-2 text-sm font-medium capitalize text-gray-900 "
                                style="text-transform: capitalize;">{{ props?.type }}
                                name</label>
                            <input type="text" v-model="formData.name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Company's name" />
                        </div>
                        <button type="submit" @click="handleClick"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update
                            and save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</template>


<style lang="scss" scoped></style>
