@extends('layouts.full')

@section('title', $rental->property->address)

@section('content')

    <div class="columns">
        <div class="column is-one-quarter">
            <div class="card">
                <div class="card-content">
                    <a href="{{ route('dashboard.rentals.index') }}" class="button is-link is-outlined is-fullwidth">
                        Back to your rentals
                    </a>
                </div>
            </div>

        </div>
        <div class="column is-three-quarters">
            <div class="card">
                <div class="card-content">
                    <div class="level">
                        <div class="level-left"></div>
                        <div class="level-right">
                            <div class="buttons">
                                <a href="{{ route('dashboard.rentals.edit', [$rental]) }}" class="button is-small">Edit Rental</a>
                                <button class="button is-small is-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div class="level">
                        <div class="level-left">
                            <div class="content">
                                <p class="title is-4">{{ $rental->property->address }}</p>
                                <p class="subtitle is-6">
                                    {{ $rental->property->city }}, {{ $rental->property->state }}
                                    {{ $rental->property->zipcode }}</p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="content">
                                <p class="title is-4">${{ $rental->rent_monthly }}/mo</p>
                                <p class="subtitle is-6">${{ $rental->rent_deposit }} deposit</p>
                            </div>
                        </div>
                    </div>

                    <div id="tabs-with-content">
                        <div class="tabs is-centered">
                            <ul>
                                <li><a>Applicants</a></li>
                                <li><a>Details</a></li>
                                <li><a>Photos</a></li>
                            </ul>
                        </div>
                        <div>
                            <section class="tab-content">
                                @foreach($rental->applications as $application)
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-64x64 is-rounded">
                                                <img src="https://bulma.io/images/placeholders/128x128.png">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>{{ $application->user->name }}</strong> <small>{{ $application->applied_at }}</small>
                                                    <br>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <div class="buttons">
                                                <form method="POST" action="{{ route('dashboard.rentals.application.approve', [$rental, $application]) }}">
                                                    @csrf

                                                    <button type="submit" class="button is-primary">Approve</button>
                                                </form>
                                                <form method="POST" action="{{ route('dashboard.rentals.application.reject', [$rental, $application]) }}">
                                                    @csrf

                                                    <button type="submit" class="button is-danger">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </section>
                            <section class="tab-content">
                                <pre>{{ json_encode($rental, JSON_PRETTY_PRINT) }}</pre>
                            </section>
                            <section class="tab-content">

                                @foreach($rental->photos as $photo)
                                    <figure class="image is-16by9">
                                        <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->name }}">
                                    </figure>
                                @endforeach

                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
