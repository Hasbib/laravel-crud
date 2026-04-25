<script setup>
import { ref, reactive, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import ButtonSuccess from '@/Components/Button/ButtonSuccess.vue';
import Label from '@/Components/Label/Label.vue';
import TextInput from '@/Components/InputField/TextInput.vue';
import TextArea from '@/Components/InputField/TextArea.vue';

const props = defineProps({
    mahasiswa: Object,
    user: Object,
});

const form = reactive({
    nama: '',
    nim: '',
    jurusan: '',
    alamat: '',
});

const isLoading = ref(false);

onMounted(() => {
    if (props.mahasiswa) {
        form.nama = props.mahasiswa.nama || '';
        form.nim = props.mahasiswa.nim || '';
        form.jurusan = props.mahasiswa.jurusan || '';
        form.alamat = props.mahasiswa.alamat || '';
    }
});

function submit() {
    isLoading.value = true;
    router.put(`/edit/mahasiswa/${props.mahasiswa.id}`, form, {
        onFinish: () => { isLoading.value = false; },
        onError: () => { isLoading.value = false; }
    });
}

function cancel() {
    router.get('/mahasiswa');
}
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <HeaderLayout :user="user" />
        <div class="p-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold">Edit Mahasiswa</h1>
                    <p class="text-gray-600">Ubah informasi mahasiswa</p>
                </div>
                <form @submit.prevent="submit">
                    <div>
                        <Label text="Nama" />
                        <TextInput v-model="form.nama" placeholder="Masukkan nama mahasiswa" required />
                    </div>
                    <div>
                        <Label text="NIM" />
                        <TextInput v-model="form.nim" placeholder="Masukkan NIM" required />
                    </div>
                    <div>
                        <Label text="Jurusan" />
                        <TextInput v-model="form.jurusan" placeholder="Masukkan jurusan" required />
                    </div>
                    <div>
                        <Label text="Alamat" />
                        <TextArea v-model="form.alamat" placeholder="Masukkan alamat" />
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" @click="cancel" class="btn btn-outline" :disabled="isLoading">
                            Batal
                        </button>
                        <ButtonSuccess type="submit" :disabled="isLoading">
                            <span v-if="isLoading" class="loading loading-spinner loading-sm"></span>
                            {{ isLoading ? 'Menyimpan...' : 'Update Mahasiswa' }}
                        </ButtonSuccess>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>