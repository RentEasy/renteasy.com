@extends('layouts.app')

@section('body')
    @include('layouts.nav')

    <section id="login" class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    @yield('content')
                    <p class="has-text-grey">
                        @if(Route::current()->getName() == 'login')
                        <a href="{{ route('register') }}">Register</a> &nbsp;·&nbsp;
                        @else
                        <a href="{{ route('login') }}">Login</a> &nbsp;·&nbsp;
                        @endif
                        <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
                        <a href="/">Need Help?</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
