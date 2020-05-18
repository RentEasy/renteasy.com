<template>
    <div class="field">
        <label class="label">{{ label }}</label>
        <div v-bind:class="[{ 'has-icons-right': errors}, 'control', 'is-expanded']">
            <input :type="type" :value="value" @input="handleInput" v-bind:class="[{ 'is-danger': errors }, 'input']">
            <span class="icon is-small is-right" v-if="errors">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
        </div>
        <p class="help is-danger" v-if="errors">{{ errors.join(', ') }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: "text"
            },
            label: {
                type: String
            },
            errors: {
                type: Array
            }
        },
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
