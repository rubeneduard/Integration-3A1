<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    rooms: Object
});
</script>

<template>

    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rooms</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Button for adding a room -->
            <div class="mb-4">
                <Link :href="route('addRoom')"
                    class="bg-blue-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                Add Room
                </Link>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add your simple table here -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Room
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="room in rooms">
                                <img :src="'roomimage/' + room.image" width="200" height="200" />
                                <td class="px-6 py-4 whitespace-nowrap">{{ room.type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ room.room }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ room.price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ room.description }}</td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    
                                    <Link :href="route('editRoom', room.id )"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </Link>
                                    <!-- Delete button -->
                                    <Link onclick="return confirm('are you sure to delete this?')" 
                                    :href="route('deleteRoom', room.id)"
                                    class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                    </Link>

                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
