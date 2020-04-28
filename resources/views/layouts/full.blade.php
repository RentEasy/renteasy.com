@extends('layouts.app')

@section('body')
    @include('layouts.nav')

    @if(config('app.env') == 'local')
    <div class="notification is-warning">
        <strong>Warning!</strong> This is our public testing site for now, no rentals that appear here are actual. Site functionality will work, but it will not translate into any real world outcomes.
    </div>
    @endif

    <div class="container container-margin-top">
        @yield('content')
    </div>
@endsection
