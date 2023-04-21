<!-- タスク日付検索 -->
<template>
    <form :action="route" method="GET" class="order--toolbar mt-4" ref="editForm" @submit.prevent="handleSubmit">
        <div class="form-group col-12 col-md-3 me-3">
            <input type="date" name="date" id="date" class="form-control" :value="value" @change="handleChange">
        </div>
    </form>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            required: true,
        },
        csrfToken: {
            type: String,
            required: true,
        },
        route: {
            type: String,
            required: true,
        },
    },
    methods: {
        handleSubmit() {
            this.$refs.editForm.submit()
        },
        handleChange() {
            this.handleSubmit();
        }
    },
};
</script>