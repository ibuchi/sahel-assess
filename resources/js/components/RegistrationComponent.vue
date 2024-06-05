<script setup>
import { onMounted, ref, watchEffect, watch } from "vue";
import { http } from "../utils/request";
import { useCountry } from './../composables/useCountry';


const authUser = ref('');
const formData = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    country_id: '',
    photo: null,
    phone: '',
    address: '',
});
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const {
    getCountry,
    countries,
} = useCountry()

const submitForm = async () => {
    console.log(formData.value);
    authUser.value = (await http.post('auth/register', formData.value, {
        headers: {
            'Content-Type': 'multipart/form-data',
            'X-CSRF-TOKEN': csrfToken
        }
    }
    )).data;
}


watch(authUser, (newValue) => {
    console.log(newValue);
    if (newValue.status) {
        window.location.href = 'login'

    }
})

const handleFileChange = (event) => {
    formData.value.photo = event.target.files[0];
    console.log(formData.value);
};

</script>
<template>


    <div class=" min-h-full  px-6 py-12 lg:px-8 w-full">

        <div class=" mx-auto bg-green-900  rounded-xl shadow text-white" style="width: 500px; padding:10px 40px;">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight">Create your
                    account</h2>
            </div>

            <div class="mt-10  ">
                <form class="space-y-6" @submit.prevent="submitForm">
                    <div>
                        <label for="name" class="input-label">Name</label>
                        <div class="mt-2">
                            <input v-model="formData.name" id="name" type="name" autocomplete="name"
                                class="form-control px-3" placeholder="your name">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="input-label">Email address</label>
                        <div class="mt-2">
                            <input v-model="formData.email" id="email" type="email" autocomplete="email"
                                class="form-control" placeholder="joe.smith@example.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="input-label">Password</label>
                        </div>
                        <div class="mt-2">
                            <input v-model="formData.password" type="password" autocomplete="current-password"
                                class="form-control" placeholder="*******">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation" class="input-label">Confirm password</label>
                        </div>
                        <div class="mt-2">
                            <input v-model="formData.password_confirmation" type="password"
                                autocomplete="current-password" class="form-control" placeholder="********">
                        </div>
                    </div>
                    <div>
                        <label for="countries" class="input-label">Select
                            an
                            option</label>
                        <select id="countries" v-model="formData.country_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>United States</option>
                            <option v-for="country in countries.data " :value="country.id">{{ country.name }}</option>

                        </select>

                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="phoneNumber" class="input-label">Phone NUmber</label>
                        </div>
                        <div class="mt-2">
                            <input v-model="formData.phone" type="number" autocomplete="current-phoneNumber"
                                class="form-control" placeholder="090360000123">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="address" class="input-label">Address</label>
                        </div>
                        <div class="mt-2">
                            <input v-model="formData.address" type="text" autocomplete="current-address"
                                class="form-control" placeholder="10 Luna Str">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="address" class="input-label">Profile</label>
                        </div>
                        <input @change="handleFileChange"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input" type="file">

                    </div>

                    <div>
                        <button type="submit" class="btn-primary">Sign in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-100">
                    I have an account
                    <a href="/login" class=" text-yellow-400 hover:text-yellow-500 font-semibold leading-6 ">Login</a>
                </p>
            </div>
        </div>
    </div>

</template>


<style lang="scss" scoped></style>