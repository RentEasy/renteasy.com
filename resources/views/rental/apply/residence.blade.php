@extends('rental.apply.wizard')

@section('step')
    <form action="{{ route('rentals.apply.saveOccupants', [$rental]) }}" method="post">
        @csrf


        <div class="columns">
            <div class="column">

                <h3>Residence History</h3>

                <form-rows>
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
                </form-rows>

            </div>
            <div class="column is-4">
                <p>Bla bla</p>
            </div>
        </div>

        <button type="submit" class="button is-success">Next Step</button>

    </form>
@endsection

