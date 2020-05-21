<template>
    <div class="field">
        <label class="label">{{ label }}</label>
        <div v-bind:class="[{'has-icons-right': errors}, 'control']">
            <div v-bind:class="[{'is-danger': errors}, 'select is-fullwidth']">
                <select :value="value" @input="handleInput">
                    <option value="">Select One</option>
                    <option v-for="(value, key) in options" v-bind:value="key">{{ value }}</option>
                </select>
            </div>
        </div>
        <p class="help is-danger" v-if="errors">{{ errors.join(', ') }}</p>
    </div>
</template>

<script>
    export default {
        props: ['label', 'options', 'errors'],
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
