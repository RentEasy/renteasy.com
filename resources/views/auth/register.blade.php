@extends('layouts.login')

@section('title', 'Register')

@section('content')
    <h3 class="title has-text-black">Register</h3>
    <hr class="login-hr">
    <p class="subtitle has-text-black">Create your RentEasy account.</p>
    <div class="box">
        <form class="login-form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="input is-large @error('name') is-danger @enderror"
                           placeholder="Your Name" autofocus required>
                </div>

                @error('name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <div class="control">
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="input is-large @error('email') is-danger @enderror"
                           placeholder="Your Email" required>
                </div>

                @error('email')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <div class="control">
                    <input type="password" name="password"
                           class="input is-large @error('password') is-danger @enderror"
                           placeholder="Your Password" required>
                </div>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <div class="control">
                    <input type="password" name="password_confirmation"
                           class="input is-large @error('password_confirmation') is-danger @enderror"
                           placeholder="Confirm Password" required>
                </div>
                @error('password_confirmation')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="button is-block is-info is-large is-fullwidth">Register <i class="fa fa-sign-in"
                                                                                   aria-hidden="true"></i>
            </button>
        </form>
    </div>
@endsection
