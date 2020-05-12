<template>
    <div class="field">
        <label class="label" :for="id">{{ label }}</label>
        <div class="control is-expanded has-icons-right">
            <input :id="id" :name="formKey" type="text" v-model="value" v-bind:class="[{ 'is-danger': error }, 'input']">
            <span class="icon is-small is-right" v-if="error">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
        </div>
        <p class="help is-danger" v-if="error">{{ errorMessage }}</p>
    </div>
</template>

<script>
    export default {
        props: [
            // Group & Iteration is for grouping with FormRows component
            'group','id', 'label', 'error', 'errorMessage', 'iteration'],
        data: () => ({
            value: '',
        }),
        computed: {
            formKey() {
                return `${this.group}[${this.iteration}][${this.id}]`
            }
        }
    }
</script>
