@extends('layouts.full')

@section('title', $rental->property->address)

@section('content')

    <div class="columns">
        <div class="column is-one-quarter is-hidden-mobile">
            <div class="card">
                <div class="card-content">
                    <a href="{{ route('rentals.index') }}" class="button is-link is-outlined is-fullwidth">
                        Back to Rentals
                    </a>
                </div>
            </div>

            @foreach($similarRentals as $sRental)
                <div class="container-margin-top">
                    <a href="{{ route('rentals.show', ['rental' => $sRental]) }}">
                        <x-rental-card :rental="$sRental"/>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="column is-three-quarters">
            <div class="card">
                <div class="card-image">
                    <div class="siema">
                        @foreach($rental->photos as $photo)
                            <figure class="image is-16by9">
                                <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->name }}">
                            </figure>
                        @endforeach
                    </div>
                </div>
                <div class="card-content">

                    <div class="level">
                        <div class="level-left">
                            <div class="content">
                                <p class="title is-4">{{ $rental->property->address }}</p>
                                <p class="subtitle is-6">
                                    {{ $rental->property->city }}, {{ $rental->property->state }}
                                    {{ $rental->property->zipcode }}</p>

                                @if(!Auth::guest() && Auth::user()->id == $rental->landlord_id)
                                    <a href="{{ route('dashboard.rentals.show', [$rental]) }}" class="button is-link">Manage this property</a>
                                @endif

                            </div>
                        </div>
                        <div class="level-right">
                            <div class="content">
                                <p class="title is-4">${{ $rental->rent_monthly }}/mo</p>
                                <p class="subtitle is-6">${{ $rental->rent_deposit }} deposit</p>

                                @if(Auth::guest())
                                    <a href="{{ route('rentals.apply', $rental) }}" class="button is-block is-info">Apply</a>
                                @elseif(Auth::user()->id !== $rental->landlord_id)
                                    <a href="#" data-modal="application" class="button is-block is-info">Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="content">

                        <a href="{{ route('rentals.index') }}">Back to Rentals</a>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <pre>{{ json_encode($rental, JSON_PRETTY_PRINT) }}</pre>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="application" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <div class="content">
                    <p>
                        <strong>Are you sure?</strong>
                        <br>
                        Submitting an application to this property will send a notification to the landlord for processing.
                    </p>

                    <form action="{{ route('rentals.simple-apply', [$rental]) }}" method="post">
                        @csrf

                        <button class="button is-primary" type="submit">Submit!</button>
                    </form>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>

@endsection
