@extends('layouts.app')

@section('body')
    @include('layouts.nav')

    <div class="columns is-centered">
        <div class="column is-8-widescreen is-12-desktop">
            <div class="card is-shady">
                <header class="card-header">
                    <p class="card-header-title is-centered is-size-3">
                        @yield('title')
                    </p>
                </header>
                <div class="card-content">
                    @if(config('app.env') == 'production')
                        <div class="notification is-warning">
                            <strong>Warning!</strong> This is our public testing site for now, no rentals that appear here are actual. Site functionality will work, but it will not translate into any real world outcomes.
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
