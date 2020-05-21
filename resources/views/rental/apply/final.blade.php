@extends('rental.apply.wizard')

@section('step')
    <form action="{{ route('rentals.apply.saveOccupants', [$rental]) }}" method="post">
        @csrf

        <div class="columns">
            <div class="column">
                <h3>{{ config('app.name') }} Account</h3>

                <div class="field">
                    <label class="label" for="password">Password</label>
                    <div class="control is-expanded">
                        <input type="password" name="password"
                               class="input @error('password') is-danger @enderror"
                               placeholder="Your Password" required>
                    </div>
                    @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="password_confirmation">Confirm Password</label>
                    <div class="control is-expanded">
                        <input type="password" name="password_confirmation"
                               class="input @error('password_confirmation') is-danger @enderror"
                               placeholder="Confirm Password" required>
                    </div>
                    @error('password_confirmation')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="button is-block is-primary">Submit Application</button>
            </div>
            <div class="column">
                <ul>
                    <li>Free Rental Applications!</li>
                    <li>Pay Rent Online</li>
                    <li>Contact your landlord anytime</li>
                </ul>
            </div>
        </div>

        <button type="submit" class="button is-success">Next Step</button>

    </form>
@endsection
