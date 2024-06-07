<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';


const props = defineProps({
    room: Object,
});

const form = useForm({
    image: props.room.image,
    room: props.room.room,
    type: props.room.type,
    price: props.room.price,
    description: props.room.description,
    username: "",
    user_id: "",

    pmethod: "",
    status: "In Progress..",

});

const getImageUrl = (imageName) => {
    // Construct the image URL using the base URL of your Laravel application
    return `/roomimage/${imageName}`;
};



const submit = () => {
    form.post(route('saveBook'), form.data()).then(() => {
        // Handle success here
        console.log("Form submitted successfully!");
        // You can also redirect the user or perform any other action as needed
    });
};



</script>

<template>

    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Booking Details</h2>
        </template>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add your form here -->
                    <form @submit.prevent="submit">
                        <!-- Form inputs -->

                        <img :src="getImageUrl(room.image)" alt="Room Image" class="mb-4" width="300" height="300" />

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">type</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.type"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.type" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">room</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.room"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.room" />
                        </div>

                   

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">description</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.description"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="mb-4">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">price</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.price"     disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">username</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.username"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.username" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">user_id</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.user_id"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.user_id" />
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">status</label>
                            <input type="text" name="status" id="status" v-model="form.status"  disabled
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.status" />
                        </div>

                        <div class="mb-4">
                            <label for="pmethod" class="block text-sm font-medium text-gray-700">Payment Method</label>
                            <select name="pmethod" id="pmethod" v-model="form.pmethod"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select Payment Method</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="PayPal">PayPal</option>
                                <option value="GCash">GCash</option>
                                <option value="Actual Payment">Actual Payment</option>
                                <!-- Add more payment method options as needed -->
                            </select>
                            <InputError class="mt-2" :message="form.errors.pmethod" />
                        </div>

                        <!-- Add more form inputs as needed -->

                        <!-- Submit button -->
                        <div class="mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
