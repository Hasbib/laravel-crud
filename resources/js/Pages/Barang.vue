<script setup>
import ButtonSuccess from '@/Components/Button/ButtonSuccess.vue'
import HeaderLayout from '@/Layouts/HeaderLayout.vue'
import { router } from '@inertiajs/vue3';
import { onMounted, onUnmounted } from 'vue';

defineProps({
    barangs: Array,
    user: Object,
});

function deleteBarang(id) {
    if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
        router.delete(`/barang/${id}`);
    }
}

let timer;

function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(() => {
        router.post('/logout');
    }, 10000); // 10 detik
}

function setupListeners() {
    window.addEventListener('mousemove', resetTimer);
    window.addEventListener('keydown', resetTimer);
    window.addEventListener('click', resetTimer);
    window.addEventListener('scroll', resetTimer);
}

function removeListeners() {
    window.removeEventListener('mousemove', resetTimer);
    window.removeEventListener('keydown', resetTimer);
    window.removeEventListener('click', resetTimer);
    window.removeEventListener('scroll', resetTimer);
}

onMounted(() => {
    setupListeners();
    resetTimer();
});

onUnmounted(() => {
    removeListeners();
    clearTimeout(timer);
});
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="mb-4">
                    <ButtonSuccess onclick="window.location.href='/tambah-barang'">
                        Tambah Barang
                    </ButtonSuccess>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-xs w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(barang, index) in barangs" :key="barang.id">
                                <th>{{ index + 1 }}</th>
                                <td>{{ barang.nama_produk }}</td>
                                <td>{{ barang.deskripsi_produk }}</td>
                                <td>Rp {{ Number(barang.harga).toLocaleString('id-ID') }}</td>
                                <td>{{ barang.stok_barang }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button @click="router.get(`/edit/barang/${barang.id}/edit`)" class="btn btn-sm btn-warning">
                                            Edit
                                        </button>
                                        <button @click="deleteBarang(barang.id)" class="btn btn-sm btn-error">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="!barangs || barangs.length === 0">
                                <td colspan="6" class="text-center">Tidak ada data barang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>