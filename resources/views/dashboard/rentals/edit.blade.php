@extends('layouts.slim')

@section('title', 'Create a Rental')

@section('content')
<div class="content">

    <h1>Edit Your Rental</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.rentals.show', [$rental]) }}">Back to Rental</a>

    <form method="POST" action="{{ route('dashboard.rentals.update', [$rental]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <x-inputs.text key="address" label="Address" :value="$rental->property->address"/>
        <x-inputs.text key="city" label="City" :value="$rental->property->city"/>
        <x-inputs.text key="state" label="State" :value="$rental->property->state"/>
        <x-inputs.text key="zipcode" label="Zipcode" :value="$rental->property->zipcode"/>

        <x-inputs.money key="rent_deposit" label="Deposit" :value="$rental->rent_deposit"/>
        <x-inputs.money key="rent_monthly" label="Monthly Rent" :value="$rental->rent_monthly"/>

        <div class="field">
            <label class="label" for="formfile">Photos</label>
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="photos" multiple>
                    <span class="file-cta">
                                      <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                      </span>
                                      <span class="file-label">
                                        Choose some photos…
                                      </span>
                                    </span>
                </label>
            </div>
        </div>


        <div class="control">
            <button type="submit" class="button is-link">Submit</button>
        </div>
    </form>
</div>
@endsection
