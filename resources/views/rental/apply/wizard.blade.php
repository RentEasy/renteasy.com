@extends('layouts.slim')

@section('title', "Application for {$rental->property->address}")

@section('content')
    <ul class="steps has-content-centered">
        <li class="steps-segment {{ set_active('rentals.apply') }}">
            <a href="{{ route('rentals.apply', [$rental]) }}" class="has-text-dark">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">About You</p>
                </div>
            </a>
        </li>
        <li class="steps-segment {{ set_active('rentals.apply.employment') }}">
            <a href="{{ route('rentals.apply.employment', [$rental]) }}" class="has-text-dark">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">Income</p>
                </div>
            </a>
        </li>
        <li class="steps-segment {{ set_active('rentals.apply.residence') }}">
            <a href="{{ route('rentals.apply.residence', [$rental]) }}" class="has-text-dark">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">Rental History</p>
                </div>
            </a>
        </li>
        <li class="steps-segment {{ set_active('rentals.apply.occupants') }}">
            <a href="{{ route('rentals.apply.occupants', [$rental]) }}" class="has-text-dark">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">Occupants</p>
                </div>
            </a>
        </li>
        <li class="steps-segment {{ set_active('rentals.apply.final') }}">
            <a href="{{ route('rentals.apply.final', [$rental]) }}" class="has-text-dark">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">Review</p>
                </div>
            </a>
        </li>
    </ul>

    <div class="content">
        @yield('step')
    </div>

@endsection
