@extends('layouts.slim')

@section('title', "Application for {$rental->property->address}")

@section('content')
    <div class="content">
        <h2>Lease Overview</h2>

        <form action="{{ route('rentals.submitApplication', [$rental]) }}" method="post">
            @csrf

            <h3>About You</h3>
            <div class="columns">
                <div class="column">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="first_name" label="First Name"/>
                            <x-inputs.text key="middle_name" label="Middle Name"/>
                            <x-inputs.text key="last_name" label="Last Name"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="suffix" label="Suffix"/>
                            <x-inputs.text key="preferred_move_in" label="Preferred Move In"/>
                            <x-inputs.dropdown key="preferred_term" label="Preferred Term" :options="$termOptions"/>
                        </div>
                    </div>

                    <h3>Contact Information</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="email" label="Email"/>
                            <x-inputs.text key="phone" label="Phone"/>
                        </div>
                    </div>

                    <h3>Identification</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.dropdown key="id_type" label="ID Type" :options="$identificationTypeOptions"/>
                            <x-inputs.dropdown key="id_state" label="ID State" :options="$stateOptions"/>
                            <x-inputs.text key="id_number" label="ID Number"/>
                        </div>
                    </div>

                </div>

                <div class="column is-4">
                    <p>These contact details are used to prepare your lease, and give the landlord contact information
                        after
                        they approve your application.</p>
                </div>
            </div>

            <hr>

            <div class="columns">
                <div class="column">

                    <h3>Residence History</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="street_address" label="Street Address"/>
                            <x-inputs.text key="unit_apt" label="Unit / Apt"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="city" label="City"/>
                            <x-inputs.dropdown key="state" label="State" :options="$stateOptions"/>
                            <x-inputs.text key="zip" label="Zipcode"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="landlord_name" label="Landlord Name"/>
                            <x-inputs.text key="landlord_phone" label="Landlord Phone"/>
                            <x-inputs.money key="rent_monthly" label="Rent Monthly"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.dropdown key="rent_own_other" label="Rent / Own" :options="$rentOrOwnOptions"/>
                            <x-inputs.text key="years" label="Years"/>
                            <x-inputs.text key="months" label="Months"/>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <p>Bla bla</p>
                </div>
            </div>

            <hr>

            <div class="columns">
                <div class="column">

                    <h3>Employment History</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.dropdown key="employer_status" label="Status"
                                               :options="$employmentStatusOptions"/>
                            <x-inputs.text key="employer_name" label="Employer Name"/>
                            <x-inputs.text key="employer_position" label="Your Position"/>
                            <x-inputs.text key="employer_start_date" label="Start Date"/>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="employer_city" label="City"/>
                            <x-inputs.dropdown key="employer_state" label="State" :options="$stateOptions"/>
                            <x-inputs.text key="employer_supervisor" label="Supervisor"/>
                            <x-inputs.text key="employer_supervisor_phone" label="Supervisor Phone"/>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <p>bla bla</p>
                </div>
            </div>

            <hr>

            <div class="columns">
                <div class="column">

                    <h3>Income History</h3>

                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="income_annual" label="Annualized Income"/>
                            <x-inputs.text key="income_comments" label="Comments"/>
                            <x-inputs.text key="income_proof" label="Income Proof"/>
                        </div>
                    </div>

                    <h3>References</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="ref_first_name" label="First Name"/>
                            <x-inputs.text key="ref_last_name" label="Last Name"/>
                            <x-inputs.dropdown key="ref_relation" label="Relation" :options="$relationOptions"/>
                            <x-inputs.text key="ref_phone" label="Phone"/>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <p>Bla bla</p>
                </div>
            </div>

            <hr>

            <div class="columns">
                <div class="column">

                    <h3>Pets</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.dropdown key="pet_type" label="Pet Type" :options="$petTypeOptions"/>
                            <x-inputs.text key="pet_breed" label="Pet Breed"/>
                            <x-inputs.text key="pet_weight" label="Pet Weight"/>
                        </div>
                    </div>

                    <h3>Vehicles</h3>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="vehicle_year" label="Year"/>
                            <x-inputs.text key="vehicle_make" label="Make"/>
                            <x-inputs.text key="vehicle_model" label="Model"/>
                            <x-inputs.text key="vehicle_plate" label="Plate"/>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <p>bla bla bla</p>
                </div>
            </div>


            <div class="columns">
                <div class="column">
                    <h3>{{ config('app.name') }} Account</h3>

                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control is-expanded">
                            <input type="password" name="password"
                                   class="input @error('password') is-danger @enderror"
                                   placeholder="Your Password" required>
                        </div>
                        @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label" for="password_confirmation">Confirm Password</label>
                        <div class="control is-expanded">
                            <input type="password" name="password_confirmation"
                                   class="input @error('password_confirmation') is-danger @enderror"
                                   placeholder="Confirm Password" required>
                        </div>
                        @error('password_confirmation')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="button is-block is-primary">Submit Application</button>
                </div>
                <div class="column">
                    <ul>
                        <li>Free Rental Applications!</li>
                        <li>Pay Rent Online</li>
                        <li>Contact your landlord anytime</li>
                    </ul>
                </div>
            </div>

        </form>
    </div>
@endsection
