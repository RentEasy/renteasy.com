@extends('layouts.app')

@section('body')
    @include('layouts.nav')

    <div class="container container-margin-top">
        @yield('content')
    </div>
@endsection
