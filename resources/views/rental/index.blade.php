@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rentals</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($rentals as $rental)
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $rental->property->address }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="/rentals/{{ $rental->id }}" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        @endforeach

                        {{ $rentals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
