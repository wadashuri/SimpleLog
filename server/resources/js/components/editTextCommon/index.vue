<!-- その場編集 -->
<template>
    <form :action="route" method="POST" ref="editForm" @submit.prevent="handleSubmit">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" class="form-control border-0" v-model="name" @blur="handleBlur">
        <input type="hidden" name="_token" :value="csrfToken">
    </form>
</template>

<script setup>

import { defineProps, ref } from 'vue';

const props = defineProps({
    value: {
        type: Object,
        required: true,
    },
    csrfToken: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    route: {
        type: String,
        required: true,
    },
});

const name = ref(props.value.name);
const originalName = ref(props.value.name);
const editForm = ref(null);

const handleSubmit = () => {
    editForm.value.submit()
}

const handleBlur = () => {
    if (name.value !== originalName.value) {
        if (confirm(`${props.title}名を変更しますか?`)) {
            handleSubmit();
        } else {
            name.value = originalName.value;
        }
    }
}
</script>