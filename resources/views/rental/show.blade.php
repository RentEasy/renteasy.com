@extends('layouts.full')

@section('content')

    <div class="columns">
        <div class="column is-one-quarter">
            <a href="{{ route('rentals.index') }}" class="button is-link is-outlined is-fullwidth">
                Back to Rentals
            </a>
            @foreach($similarRentals as $sRental)
                <a href="{{ route('rentals.show', ['rental' => $sRental]) }}">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="{{ asset($sRental->getPrimaryPhoto()->filename) }}" alt="">
                            </figure>
                        </div>
                        <div class="card-content">
                            {{ $sRental->property->address }}
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="column is-three-quarters">
            <div class="card">
                <div class="card-image">
                    <div class="siema">
                        @foreach($rental->photos as $photo)
                            <figure class="image is-16by9">
                                <img src="{{ asset($photo->filename) }}" alt="{{ $photo->name }}">
                            </figure>
                        @endforeach
                    </div>
                    <button class="prev">prev</button>
                    <button class="next">next</button>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">{{ $rental->property->address }}</p>
                            <p class="subtitle is-6">{{ $rental->property->city }}
                                , {{ $rental->property->state }} {{ $rental->property->zipcode }}</p>
                        </div>
                    </div>

                    <div class="content">


                        <a href="{{ route('rentals.index') }}">Back to Rentals</a>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        {{ $rental }}


                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                        <a href="#">#css</a> <a href="#">#responsive</a>
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
