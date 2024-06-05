<script setup>
import { ref } from "vue";
import { useCompany } from './../composables/useCompany'
import { useService } from './../composables/useService'
import { useProfile } from './../composables/useProfile'
import CreateModal from './CreateModal.vue';


const openModal2 = ref(false);


const {
    companies,
    getCompanies,
} = useCompany()

const {
    services,
    getServices,
} = useService()
const {
    profile,
    getProfile,
    updateProfile,
} = useProfile()

const toggleModal2 = () => {
    openModal2.value = false;
}



</script>

<template>
    <div class="flex  flex-col justify-center px-6 py-12 lg:px-8 w-full ">


        <CreateModal :openModal2="openModal2" :type="'profile'" :data="profile" @check2="toggleModal2" @submitForm="updateProfile"/>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-4 mt-8  sm:px-8">
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-yellow-400">
                    <a href="/companies">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Company</h3>
                    <p class="text-3xl">{{ companies.data?.length }}</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-green-400">
                    <a href="/services">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Service</h3>
                    <p class="text-3xl">{{ services.data?.length }}</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                        </path>
                    </svg></div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Total Comment</h3>
                    <p class="text-3xl">142,334</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                <div class="p-4 bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                        </path>
                    </svg></div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">Server Load</h3>
                    <p class="text-3xl">34.12%</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 mt-8  sm:px-8">
            <div class="bg-white rounded-xl p-4 shadow-xl">

                <div class="flex justify-end">
                    <div class="m-5">
                        <button @click="openModal2 = true"
                            class="flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <div class="w-32 h-32 rounded-full bg-gray-300 border-2 border-white mt-2">
                        <img :src="profile.data?.photo || 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVxhAxJ4D7MOeTTj6kR9PBeZonW5HM7giKjTbEmR-HMBwf3G1VqGnlwpO1kWrdyIZu8_U&usqp=CAU'"
                            class="rounded-full w-auto" />
                    </div>
                    <p class="font-semibold text-xl mt-1">{{ profile.data?.name }}</p>
                    <p class="font-semibold text-base text-gray-400">{{ profile.data?.email }}</p>

                    <div class="relative  p-4 rounded-lg shadow-xl w-full bg-cover bg-center h-32 mt-4"
                        style="background-image: url('https://images.pexels.com/photos/1072179/pexels-photo-1072179.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');">
                        <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                            <div>
                                <h3 class="text-center text-white text-lg">
                                    {{ profile.data?.address }}
                                </h3>
                                <h3 class="text-center text-white text-3xl mt-2 font-bold">
                                    {{ profile.data?.phone }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped></style>