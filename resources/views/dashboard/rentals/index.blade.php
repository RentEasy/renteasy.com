@extends('dashboard.layout')

@section('title', 'Your Rentals')

@section('main')
    <div class="card">
        <div class="card-content">

            <div class="level-item">
                <a class="button is-link" href="{{ route('dashboard.rentals.create') }}">Create Rental</a>
            </div>

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
{{--                    <th>Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>
                            @if($rental->current_tenancy_id)
                            <span class="tag is-success">Rented</span>
                            @else
                                <span class="tag is-info">Listed</span>
                            @endif
                        </td>
                        <td><a href="{{ route('dashboard.rentals.show', [$rental]) }}">{{ $rental->property->address }}</a></td>
                        <td>{{ $rental->property->city }}</td>
                        <td>{{ $rental->property->state }}</td>
                        <td>{{ $rental->property->zipcode }}</td>
                        <td>${{ $rental->rent_deposit }}</td>
                        <td>${{ $rental->rent_monthly }}</td>
{{--                        <td><a href="{{ route('rentals.edit', [$rental]) }}" class="button is-small">View</a></td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $rentals->links() }}
        </div>
    </div>

@endsection
