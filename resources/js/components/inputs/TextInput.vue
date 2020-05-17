<template>
    <div class="field">
        <label class="label">{{ label }}</label>
        <div class="control is-expanded has-icons-right">
            <input type="text" :value="value" @input="handleInput" v-bind:class="[{ 'is-danger': errors }, 'input']">
            <span class="icon is-small is-right" v-if="errors">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
        </div>
        <p class="help is-danger" v-if="errors">{{ errors.join(', ') }}</p>
    </div>
</template>

<script>
    export default {
        props: ['label', 'errors'],
        data: () => ({
            value: '',
        }),
        methods: {
            handleInput(event) {
                this.$emit("input", event.target.value);
            }
        }
    }
</script>
