<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />
        <div align="center">
                <img src="/Mtbagarabon.png" width="100" height="100" />
                <h1>FORGOT</h1>
            </div>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
   

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    
                    autofocus
                    autocomplete="username"
                    placeholder="Enter Your Email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
         
            <div class="mt-4" align="center">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"  >
                    Email Password Reset Link
                </PrimaryButton>
            </div>
       
        </form>
    </GuestLayout>
</template>
