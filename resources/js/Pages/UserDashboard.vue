<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    rooms: Object
});
</script>

<template>

    <Head title="User Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Dashboard</h2>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Loop through rooms -->
                <div v-for="room in rooms" :key="room.id" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Display room image -->
                        <img :src="'roomimage/' + room.image" width="200" height="200" />

                        <h1>{{ room.type }}</h1>
                        <h1>{{ room.room }}</h1>
                        <h1>{{ room.price }}</h1>
                        <h1>{{ room.description }}</h1>
                        <div align="center" class="mt-2">
                            <Link :href="route('bookRoom', room.id)"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Book Room
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
