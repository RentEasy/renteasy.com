<template>
    <form @submit.prevent="submit">
        <h3>About You</h3>

        <div v-if="errorMessage" class="notification is-danger is-light">
            There were a couple of issues submitting your application, please correct the errors below.
        </div>


        <div id="app-about" class="columns">
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
                <form-rows v-model.sync="fields.identification" :errors="errors.identification" v-slot:default="slotProps">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <dropdown-input v-model="slotProps.row.id_type" :errors="slotProps.errors.id_type"
                                        label="ID Type" :options="options.identificationTypeOptions"/>
                        <dropdown-input v-model="slotProps.row.id_state" :errors="slotProps.errors.id_state"
                                        label="ID State" :options="options.stateOptions"/>
                        <text-input v-model="slotProps.row.id_number" :errors="slotProps.errors.id_number" label="ID Number"/>
                    </div>
                </div>
                </form-rows>

                <h3>References</h3>
                <form-rows v-model.sync="fields.reference" :errors="errors.reference" v-slot:default="slotProps">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <text-input v-model="slotProps.row.ref_first_name" :errors="slotProps.errors.ref_first_name" label="First Name"></text-input>
                            <text-input v-model="slotProps.row.ref_last_name" :errors="slotProps.errors.ref_last_name" label="Last Name"></text-input>
                            <dropdown-input v-model="slotProps.row.ref_relation" :errors="slotProps.errors.ref_relation"
                                            label="Relation" :options="options.relationOptions"/>
                            <text-input v-model="slotProps.row.ref_phone" :errors="slotProps.errors.ref_phone" label="Phone"></text-input>
                        </div>
                    </div>
                </form-rows>

            </div>

            <div class="column is-4">
                <p>These contact details are used to prepare your lease, and give the landlord contact information
                    after they approve your application.</p>
            </div>
        </div>


        <div id="app-income" class="columns">
            <div class="column">
                <h3>Income History</h3>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <text-input v-model="fields.income_annual" :errors="errors.income_annual" label="Annualized Income"/>
                        <text-input v-model="fields.income_comments" :errors="errors.income_comments" label="Comments"/>
                        <text-input v-model="fields.income_proof" :errors="errors.income_proof" label="Income Proof"/>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <p>Bla bla</p>
            </div>
        </div>


        <div id="app-employment" class="columns">
            <div class="column">

                <h3>Employment History</h3>
                <form-rows v-model.sync="fields.employer" :errors="errors.employer" v-slot:default="slotProps">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <dropdown-input v-model="slotProps.row.employer_status" :errors="slotProps.errors.employer_status" label="Status"
                                               :options="options.employmentStatusOptions"/>
                            <text-input v-model="slotProps.row.employer_name" :errors="slotProps.errors.employer_name" label="Employer Name"/>
                            <text-input v-model="slotProps.row.employer_position" :errors="slotProps.errors.employer_position" label="Your Position"/>
                            <text-input v-model="slotProps.row.employer_start_date" :errors="slotProps.errors.employer_start_date" label="Start Date"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <text-input v-model="slotProps.row.employer_city" :errors="slotProps.errors.employer_city" label="City"/>
                            <dropdown-input v-model="slotProps.row.employer_state" :errors="slotProps.errors.employer_state" label="State" :options="options.stateOptions"/>
                            <text-input v-model="slotProps.row.employer_supervisor" :errors="slotProps.errors.employer_supervisor" label="Supervisor"/>
                            <text-input v-model="slotProps.row.employer_supervisor_phone" :errors="slotProps.errors.employer_supervisor_phone" label="Supervisor Phone"/>
                        </div>
                    </div>
                </form-rows>
            </div>
            <div class="column is-4">
                <p>bla bla</p>
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
            setErrors(errors) {
                this.errors = this.dotToObject(errors);
            },
            submit() {
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
                        console.error(error.response.data.errors);
                        if (error.response.status === 422) {
                            this.setErrors(error.response.data.errors || {});
                            this.errorMessage = error.response.data.message || null;
                            window.scrollTo(0, 0);
                        }
                    });
                }
            },
        },
    }

</script>
