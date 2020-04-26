@extends('layouts.full')

@section('content')
    <a class="btn btn-primary" href="{{ route('rentals.create') }}">Create Rental</a>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="columns is-multiline is-mobile">
    @foreach ($rentals as $rental)
        <div class="column is-one-quarter">
            <div class="card">
                <div class="card-image">
                    <figure class="image">
                        <img src="{{ asset($rental->getPrimaryPhoto()->filename) }}" alt="">
                    </figure>
                </div>
                <div class="card-content">
                    <p class="title">{{ $rental->property->address }}</p>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">❤️</a>
                    <a href="{{ route('rentals.show', ['rental' => $rental]) }}" class="card-footer-item">View Property</a>
                </footer>
            </div>
        </div>
    @endforeach
    </div>

    {{ $rentals->links() }}
@endsection
