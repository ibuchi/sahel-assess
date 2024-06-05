<script setup>
import { computed, onMounted, ref, watch } from "vue";
import { useStorage } from '@vueuse/core'
import { http } from "../utils/request";

const authUser = ref('');
const formData = ref({
    email: '',
    password: '',

});
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


const submitForm = async () =>
    authUser.value = (await http.post('auth/login', formData.value, {
        headers: {
            'Content-Type': 'multipart/form-data',
            'X-CSRF-TOKEN': csrfToken
        }
    }
    )).data;


watch(authUser, (newValue) => {
    if (newValue.status) {
        useStorage('auth-token', authUser.value.data.token.value)
        window.location.href = 'dashboard'

    }

})


</script>
<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
        <div class=" mx-auto bg-green-900  rounded-xl shadow text-white" style="width: 500px; padding:10px 40px;">

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight ">Sign in to your
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                <form class="space-y-6" @submit.prevent="submitForm">
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
                                class="form-control" placeholder="**********">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn-primary">Sign in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-100">
                    I don't have an account
                    <a href="/register" class=" text-yellow-400 hover:text-yellow-500 font-semibold leading-6 ">Register</a>
                </p>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped></style>