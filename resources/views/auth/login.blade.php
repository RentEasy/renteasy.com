@extends('layouts.login')

@section('title', 'Login')

@section('content')
    <h3 class="title has-text-black">Login</h3>
    <hr class="login-hr">
    <p class="subtitle has-text-black">Please login to proceed.</p>
    <div class="box">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="input is-large @error('email') is-danger @enderror"
                           placeholder="Your Email" autofocus required>
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
                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
            </div>
            <button class="button is-block is-info is-large is-fullwidth">Login <i class="fa fa-sign-in"
                                                                                   aria-hidden="true"></i>
            </button>
        </form>
    </div>
@endsection
