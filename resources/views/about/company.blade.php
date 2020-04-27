@extends('layouts.full')

@section('title', 'For Landlords')

@section('content')
    <div class="content">
        <h1>Company</h1>

        <div class="columns is-vcentered">
            <div class="column">
                <h2>Marketplace</h2>
                <p>An open company is a simple idea, take your
                    traditional closed company processes and ideals, and make them public by default. Some examples
                    are <a href="https://about.gitlab.com/handbook/" target="_blank" rel="noopener noreferrer"
                           data-token-index="1" data-reactroot="">GitLab</a> and <a href="https://open.buffer.com/"
                                                                                    rel="noopener noreferrer">Buffer</a>.
                </p>
                <p>RentEasy is also an open company, with a strong commitment to transparency &amp; fairness. We’re
                    almost like a <a href="https://en.wikipedia.org/wiki/Worker_cooperative" target="_blank"
                                     rel="noopener">worker cooperative</a>, where each member of the team claims a
                    stake in the ownership.</p>
            </div>
            <div class="column">
                <figure class="image">
                    <img src="{{ asset('img/about/company-open-company.png') }}"
                         alt="A collaborative open company">
                </figure>
            </div>
        </div>

        <div class="columns is-vcentered">
            <div class="column">
                <h2>Financials & Revenue</h2>

                <p>We take transparency seriously, so all of our financial statements are public record and will be shared as they become available.</p>

                <p>We make a commitment to treating our customers fairly and charging what is required to support the business and the families of those who work on it.</p>

{{--                Credit Card Cost Table:--}}
{{--                Cost of Rent: $1,483--}}
{{--                RentEasy Fees: $74.15--}}
{{--                Stripe Fees: $43.30--}}
{{--                RentEasy Income: $30.85--}}

{{--                ACH-based Cost Table:--}}
{{--                Cost of Rent: $1,483--}}
{{--                RentEasy Fees: $74.15--}}
{{--                Stripe Fees: $5.00--}}
{{--                RentEasy Income: $69.15--}}


            </div>
            <div class="column">
                <table>
                    <thead>
                    <tr>
                        <th>Profit & Loss</th>
                        <th>YTD 2020</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><th>Net Sales</th><td>$0.00</td></tr>
                    <tr><th>Cost of Sales</th><td>$0.00</td></tr>
                    <tr><th>Operating Expenses</th><td>$0.00</td></tr>
                    <tr><th>- Research & Development</th><td>-$37.00</td></tr>
                    <tr><th>- General & Administrative</th><td>$0.00</td></tr>
                    <tr><th>Net Income</th><td>-$37.00</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="has-text-centered">
                <h2>The Team</h2>
                <p>Since RentEasy is an open company, anyone can join the team! These are our current public team members, if you’re interested in becoming one, keep reading!</p>
            </div>
            <div class="columns is-centered" style="padding: 2rem">
                <div class="column">
                    <img src="{{ asset('img/about/people/luke-strickland.png') }}" alt="">
                    <h3>Luke Strickland</h3>
                </div>
                <div class="column">
                    <img src="{{ asset('img/about/people/fake-person-1.png') }}" alt="">
                    <h3>A Fake Person</h3>
                </div>
                <div class="column">
                    <img src="{{ asset('img/about/people/fake-person-2.png') }}" alt="">
                    <h3>Is This You?</h3>
                </div>
            </div>
        </div>

    </div>

@endsection
