@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Rentals</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/rentals">
                            @csrf

                            <x-text-input key="address" label="Address"/>
                            <x-text-input key="city" label="City"/>
                            <x-text-input key="state" label="State"/>
                            <x-text-input key="zipcode" label="Zipcode"/>

                            <x-money-input key="rent_deposit" label="Deposit"/>
                            <x-money-input key="rent_monthly" label="Monthly Rent"/>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
