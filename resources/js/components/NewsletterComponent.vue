<template>
    <form name="email-form" @submit.prevent="onSubmit">

        <div class="notification is-success" v-show="success">
            <button type="button" class="delete" v-on:click="success = false"></button>
            You have been subscribed to our mailing list!
        </div>

        <div class="notification is-danger" v-show="error">
            <button type="button" class="delete" v-on:click="error = false"></button>
            There was a problem submitting your request!
        </div>

        <div class="field">
            <div class="control has-icons-left is-expanded">
                <input type="email" name="email" class="input is-medium is-flat"
                       placeholder="Your Email" required v-model="email">
                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>

            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input name="agree" v-model="agree" type="checkbox">
                    I agree to the <a :href="privacyRoute">privacy policy</a>
                </label>
            </div>
        </div>


        <div class="field">
            <div class="control">
                <button class="button is-medium is-link" type="submit" :disabled="!!disabled" >
                    <strong>Subscribe</strong>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['submitRoute', 'privacyRoute'],
        data: () => ({
            success: false,
            error: false,
            email: null,
            agree: false,
            disabled: false
        }),
        methods: {
            onSubmit(event) {
                this.error = false;
                this.success = false;

                let parent = this;
                window.axios.post(this.submitRoute, {
                    email: this.email,
                    agree: this.agree,
                }).then(function (response) {
                    parent.success = true;
                    parent.disabled = true;
                }).catch(function (error) {
                    parent.error = true;
                });

                this.$emit('form-submitted');
            }
        }
    }
</script>
