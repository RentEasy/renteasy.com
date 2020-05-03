<template>
    <form name="email-form" >

        <div class="notification is-success" v-show="success">
            <button class="delete" v-on:click="success = false"></button>
            You have been subscribed to our mailing list!
        </div>

        <div class="notification is-danger" v-show="error">
            <button class="delete" v-on:click="error = false"></button>
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
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>


        <div class="field">
            <div class="control">
                <button class="button is-medium is-link" type="submit">
                    <strong>Subscribe</strong>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['submitRoute'],
        data: () => ({
            success: false,
            error: false,
            email: null,
            agree: false
        }),
        methods: {
            onSubmit(event) {
                let parent = this;
                window.axios.post(this.submitRoute, {
                    email: this.email,
                    agree: this.agree,
                }).then(function (response) {
                    parent.success = true;
                    console.log(response);
                })
                    .catch(function (error) {
                        parent.error = true;
                    });

                this.$emit('form-submitted');
            }
        }
    }
</script>
