@extends('layouts.slim')

@section('title', "Application for {$rental->property->address}")

@section('content')
    <div class="content">
        <h2>Lease Overview</h2>

        <app-form submit-route="{{ route('rentals.submitApplication', [$rental]) }}" form-options-route="{{ route('rentals.getFormOptions', [$rental]) }}"></app-form>

    </div>
@endsection
