@extends('layouts.hero')

@section('title', 'Rental Property Marketplace')

@section('content')

    <section class="hero is-medium is-bold has-background">
        <img class="hero-background is-transparent" src="{{ asset('img/pittsburgh-row-houses.jpg') }}" alt="Pittsurgh Row Houses">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Modern Rental Management, <br>minus the property management company
                </h1>
                <p class="has-text-centered">
                    <a href="{{ route('about.for-landlords') }}" class="button is-medium is-primary">
                        For Landlords
                    </a>

                    <a href="{{ route('about.for-renters') }}" class="button is-medium is-primary">
                        For Renters
                    </a>
                </p>
            </div>
        </div>
    </section>
    <div class="box cta">
        <p class="has-text-centered">
            <span class="tag is-primary">Coming Soon!</span> Leasary is launching soon! In the meantime, feel free to explore our site to get a feel for it.
        </p>
    </div>
    <section class="container">
        <div class="columns features">
            <div class="column">
                <div class="card is-shady">
                    <div class="card-content">
                        <div class="content">
                            <div class="columns is-vcentered">
                                <div class="column">
                                    <img src="{{ asset('img/various/5060331735_499cf5d7ac_h.jpg') }}" alt="">
                                </div>
                                <div class="column">
                                    <h4>What is Leasary?</h4>
                                    <p>Leasary is a rental property marketplace focused on modernizing the traditionally pen-and-paper rental industry. We help landlords & tenants solve frustrating issues like applications, maintenance, and payments while also building innovative contract generation, and marketplaces for new tenants. Our goal is to have a “Buy Now” experience with rentals so our landlords & tenants can go back to focusing on the important stuff.</p>
                                    <p><a href="{{ route('about.company') }}">Learn more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
