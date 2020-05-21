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
                                @foreach($applications as $application)
                                    <article class="media">
                                        <div class="media-left">
                                            <p class="image is-128x128">
                                                <img src="https://i.imgur.com/ypaern2.png" alt="">
                                            </p>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <strong>{{ $application->user->fullName() }}</strong> <small>{{ $application->applied_at }}</small>

                                                <section>
                                                    <h3>Employment History</h3>
                                                    @foreach($application->employments as $employment)
                                                        <div class="columns">
                                                            <div class="column">
                                                                <strong>Position</strong>
                                                                <p>{{ $employment->position }}</p>

                                                                <strong>Tenure</strong>
                                                                <p>{{ $employment->tenure() }}</p>
                                                            </div>
                                                            <div class="column">
                                                                <strong>Business</strong>
                                                                <p>
                                                                    {{ $employment->name }}<br>
                                                                    {{ $employment->city }}, {{ $employment->state }}
                                                                </p>

                                                                <strong>Supervisor Contact</strong>
                                                                <p>{{ $employment->supervisor }} at {{ $employment->supervisor_phone }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </section>
                                                <section>
                                                    <h3>Rental History</h3>

                                                    <progress class="progress is-success is-large" value="60" max="100">60%</progress>

                                                    @foreach($application->rentalHistories as $history)
                                                        <div class="columns">
                                                            <div class="column">
                                                                <strong>Address</strong>
                                                                <p>
                                                                    {{ $history->street_address }}<br>
                                                                    {{ $history->city }}, {{ $history->state }}
                                                                </p>

                                                                <strong>Tenure</strong>
                                                                <p>{{ $history->tenure() }}</p>
                                                            </div>
                                                            <div class="column">
                                                                <strong>Monthly Rent</strong>
                                                                <p>
                                                                    ${{ $history->rent_monthly }}
                                                                </p>

                                                                <strong>Previous Landlord</strong>
                                                                <p>{{ $history->landlord_name }} tel:{{ $history->landlord_phone }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </section>
                                                <section>
                                                    <h3>Pets & Vehicles</h3>

                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Breed</th>
                                                            <th>Weight</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($application->pets as $pet)
                                                            <tr>
                                                                <td>{{ $pet->type }}</td>
                                                                <td>{{ $pet->breed }}</td>
                                                                <td>{{ $pet->weight }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>Year</th>
                                                            <th>Make</th>
                                                            <th>Model</th>
                                                            <th>Plate</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($application->vehicles as $car)
                                                            <tr>
                                                                <td>{{ $car->year }}</td>
                                                                <td>{{ $car->make }}</td>
                                                                <td>{{ $car->model }}</td>
                                                                <td>{{ $car->plate }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </section>

                                                <section>
                                                    <h3>References</h3>
                                                    <div class="columns">
                                                        @foreach($application->references as $ref)
                                                        <div class="column">
                                                            <p>
                                                                {{ $ref->first_name }} {{ $ref->last_name }}<br>
                                                                {{ $ref->relation }}<br>
                                                                {{ $ref->phone }}
                                                            </p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </section>

                                                <p>

                                                    <br>
                                                    <pre>{{ json_encode($application, JSON_PRETTY_PRINT) }}</pre>
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
