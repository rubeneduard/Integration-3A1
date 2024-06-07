<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    books: Object
});

const getImageUrl = (imageName) => {
    // Construct the image URL using the base URL of your Laravel application
    return `/roomimage/${imageName}`;
};

</script>

<template>

    <Head title="User Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Booking</h2>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Loop through rooms -->
                <div v-for="book in books" :key="book.id" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Display book image -->
                        <img :src="getImageUrl(book.image)" alt="Room Image" class="mb-4" width="300" height="300" />

                        <h1><b>Type Name: </b> {{ book.type }}</h1>
                        <h1><b>Room: </b> {{ book.room }}</h1>
                        <h1><b>Price: </b> {{ book.price }}</h1>
                        <h1><b>Description: </b> {{ book.description }}</h1>
                        <h1><b>My Id: </b> {{ book.user_id }}</h1>
                        <h1><b>My Name: </b> {{ book.username }}</h1>

                        <h1><b>payment Method: </b> {{ book.pmethod }}</h1>
                        <h1><b>Status:  </b> {{ book.status }}</h1>

                        <!-- Cancel button -->
                        <div class="mt-4">
                            <Link onclick="return confirm('are you sure to cancel your booking?')"
                                :href="route('cancelBook', book.id)"
                                class="mt-6 bg-red-500 text-white py-2 px-4 rounded">
                            Cancel
                            </Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
