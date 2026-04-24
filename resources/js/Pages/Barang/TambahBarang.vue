<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import Container from '@/Components/Container/Container.vue'
import ButtonSuccess from '@/Components/Button/ButtonSuccess.vue'
import Label from '@/Components/Label/Label.vue'
import TextInput from '@/Components/InputField/TextInput.vue'
import TextArea from '@/Components/InputField/TextArea.vue'
import NumberInput from '@/Components/InputField/NumberInput.vue'

const form = reactive({
    nama_produk: '',
    deskripsi_produk: '',
    harga: '',
    stok_barang: '',
});

function submit() {
    router.post('/tambah-barang', form);
}
</script>

<template>
    <Container>
        <form @submit.prevent="submit">
            <div>
                <Label text="Nama Barang" />
                <TextInput v-model="form.nama_produk" placeholder="Masukkan nama barang" />
            </div>
            <div>
                <Label text="Deskripsi Barang" />
                <TextArea v-model="form.deskripsi_produk" placeholder="Masukkan deskripsi barang" />
            </div>
            <div>
                <Label text="Harga Barang" />
                <NumberInput v-model="form.harga" placeholder="Masukkan harga" />
            </div>
            <div>
                <Label text="Stok Barang" />
                <NumberInput v-model="form.stok_barang" placeholder="Masukkan stok" />
            </div>
            <div class="flex justify-end">
                <ButtonSuccess type="submit">Tambah</ButtonSuccess>
            </div>
        </form>
    </Container>
</template>