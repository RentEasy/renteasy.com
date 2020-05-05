@extends('layouts.slim')

@section('title', "Application for {$rental->property->address}")

@section('content')
    <div class="content">
        <h2>Lease Overview</h2>

        <h3>About You</h3>
        <div class="columns">
            <div class="column">
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="first_name" label="First Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="middle_name" label="Middle Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="last_name" label="Last Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="suffix" label="Suffix"/>
                    </p>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="preferred_move_in" label="Preferred Move In"/>
                    </p>
                    <p class="control">
                        <x-inputs.dropdown key="preferred_term" label="Preferred Term" :options="$termOptions"/>
                    </p>
                </div>

                <h3>Contact Information</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="email" label="Email"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="phone" label="Phone"/>
                    </p>
                </div>

                <h3>Pets</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.dropdown key="pet_type" label="Pet Type" :options="$petTypeOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="pet_breed" label="Pet Breed"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="pet_weight" label="Pet Weight"/>
                    </p>
                </div>

                <h3>Residence History</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="street_address" label="Street Address"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="unit_apt" label="Unit / Apt"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="city" label="City"/>
                    </p>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.dropdown key="state" label="State" :options="$stateOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="zip" label="Zipcode"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="country" label="Country"/>
                    </p>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="landlord_name" label="Landlord Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="landlord_phone" label="Landlord Phone"/>
                    </p>
                    <p class="control">
                        <x-inputs.money key="rent_monthly" label="Rent Monthly"/>
                    </p>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.dropdown key="rent_own_other" label="Rent / Own" :options="$rentOrOwnOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="years" label="Years"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="months" label="Months"/>
                    </p>
                </div>

                <h3>Employment History</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.dropdown key="employer_status" label="Status" :options="$employmentStatusOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="employer_name" label="Employer Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="employer_position" label="Your Position"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="employer_start_date" label="Start Date"/>
                    </p>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="employer_city" label="City"/>
                    </p>
                    <p class="control">
                        <x-inputs.dropdown key="employer_state" label="State" :options="$stateOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="employer_supervisor" label="Supervisor"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="employer_supervisor_phone" label="Supervisor Phone"/>
                    </p>
                </div>

                <h3>Income History</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="income_annual" label="Annualized Income"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="income_comments" label="Comments"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="income_proof" label="Income Proof"/>
                    </p>
                </div>

                <h3>References</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="ref_first_name" label="First Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="ref_last_name" label="Last Name"/>
                    </p>
                    <p class="control">
                        <x-inputs.dropdown key="ref_relation" label="Relation" :options="$relationOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="ref_phone" label="Phone"/>
                    </p>
                </div>

                <h3>Identification</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.dropdown key="id_type" label="ID Type" :options="$identificationTypeOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.dropdown key="id_state" label="ID State" :options="$stateOptions"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="id_number" label="ID Number"/>
                    </p>
                </div>

                <h3>Vehicles</h3>
                <div class="field is-grouped">
                    <p class="control">
                        <x-inputs.text key="vehicle_year" label="Year"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="vehicle_make" label="Make"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="vehicle_model" label="Model"/>
                    </p>
                    <p class="control">
                        <x-inputs.text key="vehicle_plate" label="Plate"/>
                    </p>
                </div>

            </div>

            <div class="column is-4">
                <p>These contact details are used to prepare your lease, and give the landlord contact information after
                    they approve your application.</p>
            </div>
        </div>

        <div class="columns">
            <div class="column">

            </div>
            <div class="column">
                <h3>Why Apply?</h3>
                <ul>
                    <li>Free Rental Applications!</li>
                    <li>Pay Rent Online</li>
                    <li>Contact your landlord anytime</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
