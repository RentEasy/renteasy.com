@extends('layouts.slim')

@section('title', "Application for {$rental->property->address}")

@section('content')
    <div class="">
        <plaid-easy-apply plaid-route="{{ route('rentals.postPlaid', [$rental]) }}" />

        <app-form
            submit-route="{{ route('rentals.submitApplication', [$rental]) }}"
            form-options-route="{{ route('rentals.getFormOptions', [$rental]) }}"
            validate-step-route="{{ route('rentals.validateStep', [$rental]) }}" />
    </div>
@endsection
