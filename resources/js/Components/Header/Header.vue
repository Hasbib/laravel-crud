<script setup>
import { router } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth?.user;

function logout() {
    router.post('/logout');
}
</script>

<template>
    <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <span class="font-semibold text-gray-800">{{ user?.name ?? 'Guest' }}</span>
        <button @click="logout" class="text-sm text-red-500 hover:text-red-700">
            Logout
        </button>
    </header>
</template>