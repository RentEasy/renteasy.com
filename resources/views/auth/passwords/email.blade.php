@extends('layouts.login')

@section('title', 'Reset Password')

@section('content')


    <h3 class="title has-text-black">Reset Password</h3>
    <hr class="login-hr">
    <p class="subtitle has-text-black">We'll send you an email to reset it.</p>
    <div class="box">
        @if (session('status'))
            <div class="notification is-info">
                {{ session('status') }}
            </div>
        @endif

        <form class="login-form" method="POST" action="{{ route('password.email') }}">
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

            <button class="button is-block is-info is-large is-fullwidth">Send Password Reset Link <i class="fa fa-sign-in"
                                                                                   aria-hidden="true"></i>
            </button>
        </form>
    </div>

@endsection
