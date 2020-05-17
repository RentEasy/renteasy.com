<template>
    <form @submit.prevent="submit">
        <!--        <div class="form-group">-->
        <!--            <label for="name">Name</label>-->
        <!--            <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />-->
        <!--            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>-->
        <!--        </div>-->

        <!--        <div class="form-group">-->
        <!--            <label for="email">E-mail</label>-->
        <!--            <input type="email" class="form-control" name="email" id="email" v-model="fields.email" />-->
        <!--            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>-->
        <!--        </div>-->

        <!--        <div class="form-group">-->
        <!--            <label for="message">Message</label>-->
        <!--            <textarea class="form-control" id="message" name="message" rows="5" v-model="fields.message"></textarea>-->
        <!--            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>-->
        <!--        </div>-->

        <!--        <button type="submit" class="btn btn-primary">Send message</button>-->
        <h3>About You</h3>

        <div v-if="errorMessage" class="notification is-danger is-light">
            There were a couple of issues submitting your application, please correct the errors below.
        </div>


        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <text-input v-model="fields.first_name" :errors="errors.first_name" label="First Name"/>
                        <text-input v-model="fields.middle_name" :errors="errors.middle_name" label="Middle Name"/>
                        <text-input v-model="fields.last_name" :errors="errors.last_name" label="Last Name"/>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <text-input v-model="fields.suffix" :errors="errors.suffix" label="Suffix"/>
                        <text-input v-model="fields.preferred_move_in" :errors="errors.preferred_move_in"
                                    label="Preferred Move In"/>
                        <dropdown-input v-model="fields.preferred_term" :errors="errors.preferred_term"
                                        label="Preferred Term" :options="options.termOptions"/>
                    </div>
                </div>

                <h3>Contact Information</h3>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <text-input v-model="fields.email" :errors="errors.email" label="Email"/>
                        <text-input v-model="fields.phone" :errors="errors.phone" label="Phone"/>
                    </div>
                </div>

                <h3>Identification</h3>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <dropdown-input v-model="fields.id_type" :errors="errors.id_type"
                                        label="ID Type" :options="options.identificationTypeOptions"/>
                        <dropdown-input v-model="fields.id_state" :errors="errors.id_state"
                                        label="ID State" :options="options.stateOptions"/>
                        <text-input v-model="fields.id_number" :errors="errors.id_number" label="ID Number"/>
                    </div>
                </div>

                <h3>References</h3>
                <form-rows v-for="row in fields.references">
                    <div class="field is-horizontal" v-bind:row="row">
                        <div class="field-body">
                            <text-input v-model="row.ref_first_name" :errors="errors.ref_first_name" label="First Name"></text-input>
                            <text-input v-model="row.ref_last_name" :errors="errors.ref_last_name" label="Last Name"></text-input>
                            <dropdown-input v-model="row.ref_relation" :errors="errors.ref_relation"
                                            label="Relation" :options="options.relationOptions"/>
                            <text-input key="ref_phone" label="Phone"></text-input>
                        </div>
                    </div>
                </form-rows>

            </div>

            <div class="column is-4">
                <p>These contact details are used to prepare your lease, and give the landlord contact information
                    after they approve your application.</p>
            </div>
        </div>


        <div v-if="success" class="notification is-success is-light">
            Message sent!
        </div>


        <button type="submit" class="button is-success">Next Step</button>
    </form>

</template>

<script>
    export default {
        props: [
            'submitRoute',
            'formOptionsRoute',
        ],
        mounted() {
            axios.get(this.formOptionsRoute).then(response => {
                this.options = response.data;
            }).catch(error => {
                this.errors = "Failure to retrieve form options from the backend, contact support?"
            });
        },
        data() {
            return {
                options: {
                    'termOptions': {},
                    'rentOrOwnOptions': {},
                    'petTypeOptions': {},
                    'stateOptions': {},
                    'relationOptions': {},
                    'identificationTypeOptions': {},
                    'employmentStatusOptions': {}
                },
                fields: {},
                errors: {},
                errorMessage: null,
                success: false,
                loaded: true,
            }
        },
        methods: {
            submit() {
                console.log(this.fields);

                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    this.errorMessage = null;
                    axios.post(this.submitRoute, this.fields).then(response => {
                        this.fields = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                    }).catch(error => {
                        this.loaded = true;
                        console.log(error);
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                            this.errorMessage = error.response.data.message || null;
                            window.scrollTo(0, 0);
                        }
                    });
                }
            },
        },
    }

</script>
