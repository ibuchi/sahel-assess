<script setup>
import { computed, onMounted, ref, watch } from "vue";
import { http } from "../utils/request";
import { useCompany } from './../composables/useCompany';

const allCompanies = ref([]);

const getAllCompanies = async () =>
    (allCompanies.value = (await http.get("all-companies")).data);

onMounted(() => {
    getAllCompanies();
});

</script>

<template>
    <div class="flex  flex-col justify-center px-6 py-12 lg:px-8 w-full ">
        <div class="flex justify-between">
            <h1 class="text-gray-700 font-bold text-2xl">Company</h1>
        </div>
        <div class="text-gray-400">
            Run the database seeder to get all available companies!
        </div>
        <div v-if="allCompanies.data?.length !== 0"
            class="grid grid-cols-1 md:grid-cols-4 gap-5 px-4 mt-8  sm:px-8 bg-gray-50 rounded-xl shadow-md "
            style="padding: 20px;">
            <div v-for="company in allCompanies.data" class="bg-white rounded-xl hover:shadow-2xl p-4 shadow-xl mt-4">
                <div class="flex flex-col justify-center items-center">
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/upload-social-media-post-4291893-3569926.png"
                        class="w-auto h-40 rounded-lg" />
                    <p class="font-semibold text-xl mt-1">{{ company?.name }}</p>
                    <p class="font-semibold text-sm text-gray-400 text-center">{{ company?.email }}<br> {{
                        company?.created_at }}</p>

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
