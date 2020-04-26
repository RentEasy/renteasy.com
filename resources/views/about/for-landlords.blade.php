@extends('layouts.full')

@section('content')
    <div class="content">
        <h1>For Landlords</h1>


        <div class="columns is-vcentered">
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/for-landlords-marketplace.png') }}"
                         alt="A marketplace for properties">
                </figure>
            </div>
            <div class="column">
                <h2>Marketplace</h2>
                <p>Easily list your property and create rental applications specific to your requirements. Cross post
                    your property and application to other property listing sites.</p>
                <p>Instantly generate contracts specific to your property and it’s requirements. Send the lease over to
                    the potential tenant electronically for an immediate signature.</p>
                <p>Keep tabs on the tenant with our app. Monitor expiring leases, unhappy tenants and rent payments all
                    in one place.</p>
            </div>
        </div>

        <div class="columns is-vcentered">
            <div class="column">
                <h2>Payments</h2>

                <p>Low-fee payment of rent and other property bills. Manage rent and other utility sharing programs
                    across multiple tenants and multiple units.</p>

                <p>Automatically generate an interest-bearing security deposit account that the properties deposit goes
                    into. Automatically pay back out returned security deposit at the end of the lease once a
                    walkthrough has been completed.</p>
            </div>
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/for-landlords-payments.png') }}"
                         alt="Easily get payments from your tenants">
                </figure>
            </div>
        </div>

        <div class="columns is-vcentered">
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/for-landlords-maintenance.png') }}"
                         alt="Automated maintenance for landlords">
                </figure>
            </div>
            <div class="column">
                <h2>Maintenance</h2>

                <p>Tenants can submit maintenance requests, and landlords can manage their progress as they fix the
                    issue. Keep a detailed inventory of property equipment, and schedule preventative maintenance.</p>

                <p>Instantly contract out the request to local trusted vendors. Setup annual maintenance like air filter
                    replacements or hedge trimming.</p>
            </div>
        </div>
    </div>
@endsection
