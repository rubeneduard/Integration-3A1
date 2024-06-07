


<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <!-- Sidebar Navigation -->
            <nav class="bg-white border-r border-gray-100 w-64 py-4 fixed top-0 left-0 bottom-0 shadow z-10 flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center mb-8">
                    <Link :href="route('adminDashboard')">
                        <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                    </Link>
                </div>

                <!-- User Info -->
                <div class="flex flex-col items-center">
                    <div class="px-4 text-gray-500">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div class="px-4 text-sm text-gray-500">
                        {{ $page.props.auth.user.email }}
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="mt-4 flex-grow">
                    <DropdownLink :href="route('userDashboard')" :active="route().current('userDashboard')"
                        class="block px-4 py-2 text-gray-800 hover:bg-orange-200 "
                        :class="{ 'bg-blue-500 text-white': route().current('userDashboard') }">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3a1 1 0 011 1v12a1 1 0 01-2 0V4a1 1 0 011-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" />
                            </svg>
                            Dashboard
                        </div>
                    </DropdownLink>

                    <DropdownLink :href="route('myBook')" :active="route().current('myBook')"
                        class="block px-4 py-2 text-gray-800 hover:bg-orange-200"
                        :class="{ 'bg-blue-500 text-white': route().current('myBook') }">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 3a1 1 0 00-1 1v2H5a1 1 0 00-1 1v1h2V6h6v10H6v-3H4v4a1 1 0 001 1h6v2h2v-2h2a1 1 0 001-1V4a1 1 0 00-1-1H9zM2 11h2v2H2v-2zm0 4h2v2H2v-2zm0-8h2v2H2V7z" />
                            </svg>
                            My Book
                        </div>
                    </DropdownLink>

                    

                    <DropdownLink :href="route('profile.edit')" :active="route().current('profile.edit')" style="display: none;"
                        class="block px-4 py-2 text-gray-800 hover:bg-orange-200"
                        :class="{ 'bg-blue-500 text-white': route().current('profile.edit') }">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 11-12 0 6 6 0 0112 0zm-6 8a8 8 0 00-7.938 6.563C3.925 19.891 4.925 20 6 20h8c1.075 0 2.075-.109 3.938-.437A8.001 8.001 0 0012 16z" clip-rule="evenodd" />
                            </svg>
                            Profile
                        </div>
                    </DropdownLink>

                    <DropdownLink :href="route('logout')" method="post" as="button"
                        class="block px-4 py-2 text-gray-800 hover:bg-orange-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 110 2H5v10h3a1 1 0 110 2H4a1 1 0 01-1-1V4zm9.707-.707a1 1 0 00-1.414 1.414L12.586 7H7a1 1 0 000 2h5.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414l-3-3z" clip-rule="evenodd" />
                            </svg>
                            Log Out
                        </div>
                    </DropdownLink>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="ml-64">
                <!-- Page Heading -->
                <header class="bg-white shadow" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Main Content Area -->
                <main class="mt-16">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<style>
/* You may need to adjust the styles further based on your design requirements */
</style>

