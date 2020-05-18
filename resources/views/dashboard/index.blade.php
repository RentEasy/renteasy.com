@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('main')
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Hello, {{ Auth::user()->fullName() }}.
                </h1>
                <h2 class="subtitle">
                    I hope you are having a great day!
                </h2>
            </div>
        </div>
    </section>
    <section class="info-tiles container-margin-top">
        <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">{{ $totalRentals }}</p>
                    <p class="subtitle">Rentals</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">{{ $totalRentals }}</p>
                    <p class="subtitle">Tenants</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">${{ $monthlyIncome }}</p>
                    <p class="subtitle">Monthly Income</p>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title">${{ $ytdIncome }}</p>
                    <p class="subtitle">YTD Income</p>
                </article>
            </div>
        </div>
    </section>
    <div class="columns">
        <div class="column is-6">
            <div class="card events-card">
                <header class="card-header">
                    <p class="card-header-title">
                        Rentals
                    </p>
                    <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                    </a>
                </header>
                <div class="card-table">
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <tbody>
                            @foreach($rentals as $rental)
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>{{ $rental->property->address }}</td>
                                    <td class="level-right"><a class="button is-small is-primary" href="{{ route('rentals.show', [$rental]) }}">View</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="{{ route('dashboard.rentals.index') }}" class="card-footer-item">View All</a>
                </footer>
            </div>
        </div>
        <div class="column is-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Applications
                    </p>
                    <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>{{ $application->user->fullName() }} @ {{ $application->rental->property->address }}</td>
                                    <td class="level-right"><a class="button is-small is-primary" href="{{ route('dashboard.rentals.show', [$application->rental]) }}">Review</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        User Search
                    </p>
                    <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="">
                            <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                            <span class="icon is-medium is-right">
                      <i class="fa fa-check"></i>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
