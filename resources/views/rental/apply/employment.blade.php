@extends('rental.apply.wizard')

@section('step')
    <form action="{{ route('rentals.apply.saveEmployment', [$rental]) }}" method="post">
        @csrf

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
            </div>
            <div class="column is-4">
                <p>Bla bla</p>
            </div>
        </div>


        <div class="columns">
            <div class="column">

                <h3>Employment History</h3>
                <form-rows>
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
                </form-rows>
            </div>
            <div class="column is-4">
                <p>bla bla</p>
            </div>
        </div>

        <button type="submit" class="button is-success">Next Step</button>

    </form>
@endsection
