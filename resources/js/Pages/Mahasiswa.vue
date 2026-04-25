<script setup>
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import { router } from '@inertiajs/vue3';

defineProps({
    mahasiswas: Array,
    user: Object,
});

function deleteMahasiswa(id) {
    if (confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')) {
        router.delete(`/mahasiswa/${id}`);
    }
}
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Data Mahasiswa</h1>
                    <button @click="router.get('/tambah-mahasiswa')" class="btn btn-success text-white">
                        Tambah Mahasiswa
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-xs w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(mahasiswa, index) in mahasiswas" :key="mahasiswa.id">
                                <th>{{ index + 1 }}</th>
                                <td>{{ mahasiswa.nama }}</td>
                                <td>{{ mahasiswa.nim }}</td>
                                <td>{{ mahasiswa.jurusan }}</td>
                                <td>{{ mahasiswa.alamat }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button @click="router.get(`/edit/mahasiswa/${mahasiswa.id}/edit`)" class="btn btn-sm btn-warning">
                                            Edit
                                        </button>
                                        <button @click="deleteMahasiswa(mahasiswa.id)" class="btn btn-sm btn-error">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="!mahasiswas || mahasiswas.length === 0">
                                <td colspan="6" class="text-center">Tidak ada data mahasiswa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>