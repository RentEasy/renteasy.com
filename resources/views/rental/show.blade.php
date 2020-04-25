@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rentals</div>

                    <div class="card-body">
                        <a href="{{ route('rentals.index') }}">Back to Rentals</a>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($rental->photos as $photo)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($rental->photos as $photo)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img src="{{ asset($photo->filename) }}" class="d-block w-100" alt="{{ $photo->name }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $photo->name }}</h5>
                                            <p>Some description or something?</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        {{ $rental }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
