<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    book: Object,
});

const form = useForm({
    id: props.book.id,
    image: props.book.image,
    type: props.book.type,
    room: props.book.room,
    description: props.book.description,
    price: props.book.price,
    username: props.book.username,
    user_id: props.book.user_id,
    pmethod: props.book.pmethod,
    status: "",

});




const getImageUrl = (imageName) => {
    // Construct the image URL using the base URL of your Laravel application
    return `/roomimage/${imageName}`;
};



const submit = () => {
    form.post(route("updateBook", form.id), {
        onSuccess: () => {
            // handle success
        },
    });
};


</script>

<template>

    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book Room</h2>
        </template>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add your form here -->
                    <form @submit.prevent="submit">
                        <!-- Form inputs -->

                        <div >
                            <img :src="getImageUrl(book.image)" alt="Room Image" class="mb-4" width="300"
                                height="300" />
                                <h1>Type Name:{{ book.type }},&nbsp; &nbsp;   Room:{{ book.room }},&nbsp; &nbsp;  Description:{{ book.description }},&nbsp; &nbsp;  Price:{{ book.price }},&nbsp; &nbsp;  
                                    Username:{{ book.username }},&nbsp; &nbsp;  Payment method:{{ book.pmethod }}, &nbsp; &nbsp;   </h1>
                        </div>
                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">type</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.type"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.type" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">room</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.room"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.room" />
                        </div>



                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">description</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.description"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">price</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.price"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">user_id</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.user_id"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.user_id" />
                        </div>

                        <div class="mb-4" style="display: none;">
                            <label for="room_name" class="block text-sm font-medium text-gray-700">username</label>
                            <input type="text" name="room_name" id="room_name" v-model="form.username"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <InputError class="mt-2" :message="form.errors.username" />
                        </div>



                        <div class="mb-4" style="display: none;">
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

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Actions </label>
                            <select name="status" id="status" v-model="form.status"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="">- Select -</option>
                                <option value="Approved">Approved</option>
                                <option value="Canceled">Canceled</option>

                                <!-- Add more payment method options as needed -->
                            </select>
                            <InputError class="mt-2" :message="form.errors.status" />
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
