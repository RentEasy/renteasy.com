<nav class="navbar is-fixed-top is-info">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{ route('rentals.index') }}">
                    {{ __('Rentals') }}
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        About
                    </a>

                    <div class="navbar-dropdown">
                        <a href="{{ route('about.for-renters') }}" class="navbar-item">
                            For Renters
                        </a>
                        <a href="{{ route('about.for-landlords') }}" class="navbar-item">
                            For Landlords
                        </a>
                    </div>
                </div>
            </div>
            <div class="navbar-end">
                @guest
                    <a class="navbar-item" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                        <a class="navbar-item" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    @endif
                @else
                    <a class="navbar-item" href="{{ route('home') }}">
                        Dashboard
                    </a>
                    <a href="{{ route('home') }}" class="navbar-item">
                        {{ Auth::user()->name }}
                    </a>
                    <a class="navbar-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </div>

        </div>
    </div>
</nav>
