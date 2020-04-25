@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Sidebar?</div>
                    <div class="card-body">Not sure bud.</div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Rentals</div>

                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('rentals.create') }}">Create Rental</a>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($rentals->chunk(3) as $someRentals)
                        <div class="card-deck">
                            @foreach ($someRentals as $rental)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset($rental->getPrimaryPhoto()->filename) }}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $rental->property->address }}</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make
                                                up
                                                the bulk of the card's content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('rentals.show', ['rental' => $rental]) }}"
                                               class="btn btn-primary">View Rental</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endforeach

                        {{ $rentals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
