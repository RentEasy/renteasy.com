<div class="card rental-card">
    <div class="card-image">
        <figure class="image is-16by9">
            <img src="{{ asset('storage/' . $rental->getPrimaryPhoto()->filename) }}" alt="">
        </figure>
    </div>
    <div class="card-content">
        <p class="title">{{ Str::limit($rental->property->address, 23) }}</p>
        <p class="subtitle">{{ $rental->property->city }}, {{ $rental->property->state }}</p>
    </div>
    <footer class="card-footer">
        <a href="#" class="card-footer-item">Like️</a>
        <a href="{{ route('rentals.show', ['rental' => $rental]) }}" class="card-footer-item">View Property</a>
    </footer>
</div>
