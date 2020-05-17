@extends('rental.apply.wizard')

@section('step')

    <form action="{{ route('rentals.apply.saveAbout', [$rental]) }}" method="post">
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

                <h3>References</h3>
                <form-rows :errors="{!! json_encode($errors->get('references')) !!}">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <text-input group="references" key="ref_first_name" label="First Name"></text-input>
                        <text-input group="references" key="ref_last_name" label="Last Name"></text-input>
                        <x-inputs.dropdown group="references" key="references[{{ i }}][ref_relation]" label="Relation" :options="$relationOptions"/>
                        <text-input group="references" key="ref_phone" label="Phone"></text-input>
                    </div>
                </div>
                </form-rows>

            </div>

            <div class="column is-4">
                <p>These contact details are used to prepare your lease, and give the landlord contact information
                    after
                    they approve your application.</p>
            </div>
        </div>

        <button type="submit" class="button is-success">Next Step</button>

    </form>
@endsection
