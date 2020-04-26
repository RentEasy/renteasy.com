@extends('layouts.app')

@section('body')
    @include('layouts.nav')

    <div class="container container-margin-top">
        <div class="card">
            <div class="card-content">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
