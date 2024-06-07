<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    image: null,
     room: '',
     type: '',
     price: '',
     description: '',

});


const submit = () => {
    form.post(route('saveRoom'), form.data()).then(() => {
        // Handle success here
        console.log("Form submitted successfully!");
        // You can also redirect the user or perform any other action as needed
    });
};



</script>

<template>

    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Room</h2>
        </template>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add your form here -->
                    <form @submit.prevent="submit">
                        <!-- Form inputs -->
                      

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file"  @input="form.image = $event.target.files[0]" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.image" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">type</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.type"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <InputError class="mt-2" :message="form.errors.type" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">room</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.room"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <InputError class="mt-2" :message="form.errors.room" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">description</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.description"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">price</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.price"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <InputError class="mt-2" :message="form.errors.price" />
                        </div>

                        <!-- Add more form inputs as needed -->

                        <!-- Submit button -->
                        <div class="mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </AdminLayout>
</template>
