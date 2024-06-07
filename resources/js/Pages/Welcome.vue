<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Booking and Reservation System" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        style="background-image: url('/hotel.jpg'); background-size: cover;"
    >
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-25"></div>

        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <!-- Booking and Reservation System Content -->
        <div class="container mx-auto mt-8 relative z-10">
            <h1 class="text-3xl font-semibold text-center text-white mb-8">Welcome to Mt Bagarabon Hotel Booking and Reservation System</h1>
            <p class="text-lg text-gray-300 text-center">Book your reservations easily and efficiently with our system.</p>
            <div class="flex justify-center mt-8">
                <Link
                    :href="route('register')"class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-orange-400">Book Now</Link>
            </div>
        </div>
    </div>
</template>

<style>
/* Custom Styles for Booking and Reservation System */
.container {
    max-width: 800px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
}

.button:hover {
    background-color: #45a049;
}

/* Background Overlay */
.bg-black {
    /* Adjust the opacity value as needed */
    opacity: 0.7;
}
</style>
