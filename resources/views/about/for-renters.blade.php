@extends('layouts.slim')

@section('title', 'For Renters')

@section('content')
    <div class="content">
        <div class="columns is-vcentered">
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/for-renters-marketplace.png') }}" alt="A marketplace for renters">
                </figure>
            </div>
            <div class="column">
                <h2>Marketplace</h2>
                <p>A single app for your entire rental life. Browse properties, create applications, move in, and then
                    continue to use our app to manage your new home.</p>

                <p>Instead of paying various application fees, you instead just pay the {{ config('app.name') }}
                    Application Fee, and
                    any
                    applications you make through us are free!</p>

                <p>Get support from your landlord at any time with in-app messaging. Review your lease & property rules,
                    and
                    easily review your payments or pre-move in damage pictures.</p>
            </div>
        </div>

        <div class="columns is-vcentered">
            <div class="column">
                <h2>Payments</h2>

                <p>Low-fee payment of rent and other property bills. Pay rent and other utility sharing programs to your
                    landlord without writing a paper check.</p>
                <p>Have peace of mind knowing your security deposit is being handled by {{ config('app.name') }} in an
                    automated
                    interest-bearing account.</p>
            </div>
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/for-renters-payments.png') }}" alt="Easy payments for renters">
                </figure>
            </div>
        </div>
    </div>
@endsection
