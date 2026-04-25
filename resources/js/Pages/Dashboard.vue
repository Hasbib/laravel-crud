<script setup>
import { router } from '@inertiajs/vue3';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';

defineProps({
    user: Object,
});
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Pilih Menu</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div
                    @click="router.get('/barang')"
                    class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center justify-center cursor-pointer hover:shadow-lg hover:bg-blue-50 transition duration-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800">CRUD Barang</h2>
                    <p class="text-gray-500 text-sm mt-2">Kelola data barang</p>
                </div>

                <div
                    @click="router.get('/mahasiswa')"
                    class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center justify-center cursor-pointer hover:shadow-lg hover:bg-green-50 transition duration-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800">CRUD Mahasiswa</h2>
                    <p class="text-gray-500 text-sm mt-2">Kelola data mahasiswa</p>
                </div>
            </div>
        </div>
    </div>
</template>