<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import ButtonSuccess from '@/Components/Button/ButtonSuccess.vue';
import Label from '@/Components/Label/Label.vue';
import TextInput from '@/Components/InputField/TextInput.vue';
import TextArea from '@/Components/InputField/TextArea.vue';

defineProps({
    user: Object,
});

const form = reactive({
    nama: '',
    nim: '',
    jurusan: '',
    alamat: '',
});

function submit() {
    router.post('/tambah-mahasiswa', form);
}
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Mahasiswa</h1>
                <form @submit.prevent="submit">
                    <div>
                        <Label text="Nama" />
                        <TextInput v-model="form.nama" placeholder="Masukkan nama mahasiswa" />
                    </div>
                    <div>
                        <Label text="NIM" />
                        <TextInput v-model="form.nim" placeholder="Masukkan NIM" />
                    </div>
                    <div>
                        <Label text="Jurusan" />
                        <TextInput v-model="form.jurusan" placeholder="Masukkan jurusan" />
                    </div>
                    <div>
                        <Label text="Alamat" />
                        <TextArea v-model="form.alamat" placeholder="Masukkan alamat" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <ButtonSuccess type="submit">Tambah</ButtonSuccess>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>