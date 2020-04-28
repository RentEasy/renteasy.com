@extends('dashboard.layout')

@section('title', 'Your Rentals')

@section('main')
    <div class="card">
        <div class="card-content">

            <table class="table">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zipcode</th>
                    <th>Deposit</th>
                    <th>Rent</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td><span class="tag is-success">Rented</span></td>
                        <td>{{ $rental->property->address }}</td>
                        <td>{{ $rental->property->city }}</td>
                        <td>{{ $rental->property->state }}</td>
                        <td>{{ $rental->property->zipcode }}</td>
                        <td>${{ $rental->rent_deposit }}</td>
                        <td>${{ $rental->rent_monthly }}</td>
                        <td><button class="button is-small">View</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $rentals->links() }}
        </div>
    </div>

@endsection
