<!-- その場編集 -->
<template>
    <form :action="route" method="POST" ref="editForm"
        @submit.prevent="handleSubmit">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" class="form-control border-0" v-model="name"
            @blur="handleBlur">
        <input type="hidden" name="_token" :value="csrfToken">
    </form>
</template>

<script>
export default {
    props: {
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
    },
    data() {
        return {
            name: this.value.name,
            originalName: this.value.name,
        };
    },
    methods: {
        handleSubmit() {
            this.$refs.editForm.submit()
        },
        handleBlur() {
            if (this.name !== this.originalName) {
                if (confirm(`${this.title}名を変更しますか?`)) {
                    this.handleSubmit();
                } else {
                    this.name = this.originalName;
                }
            }
        },
    },
};
</script>