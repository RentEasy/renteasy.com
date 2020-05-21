@extends('rental.apply.wizard')

@section('step')
    <form action="{{ route('rentals.apply.saveOccupants', [$rental]) }}" method="post">
        @csrf

        <div class="columns">
            <div class="column">

                <h3>Pets</h3>
                <form-rows>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.dropdown key="pet_type" label="Pet Type" :options="$petTypeOptions"/>
                            <x-inputs.text key="pet_breed" label="Pet Breed"/>
                            <x-inputs.text key="pet_weight" label="Pet Weight"/>
                        </div>
                    </div>
                </form-rows>

                <h3>Vehicles</h3>
                <form-rows>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <x-inputs.text key="vehicle_year" label="Year"/>
                            <x-inputs.text key="vehicle_make" label="Make"/>
                            <x-inputs.text key="vehicle_model" label="Model"/>
                            <x-inputs.text key="vehicle_plate" label="Plate"/>
                        </div>
                    </div>
                </form-rows>
            </div>
            <div class="column is-4">
                <p>bla bla bla</p>
            </div>
        </div>

        <button type="submit" class="button is-success">Next Step</button>

    </form>
@endsection
