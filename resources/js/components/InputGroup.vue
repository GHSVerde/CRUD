<template>
    <div class="form-group row">
        <label :for="name" class="col-md-4 col-form-label text-md-right">{{ text }}</label>

        <div class="col-md-8">
            <slot></slot>

                <span v-if="error" class="invalid-feedback" role="alert">
                    <strong>{{ error }}</strong>
                </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['text', 'name', 'error'],
    }
</script>