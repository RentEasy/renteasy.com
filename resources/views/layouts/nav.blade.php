<nav class="navbar is-fixed-top is-primary">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="{{ url('/') }}">
                <img src="{{ asset('img/leasary-with-text.png') }}" alt="{{ config('app.name') }}">
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
                <a class="navbar-item" href="{{ route('blog.index') }}">
                    {{ __('Blog') }}
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        About
                    </a>

                    <div class="navbar-dropdown">
                        <a href="{{ route('about.company') }}" class="navbar-item">
                            Company
                        </a>
                        <a href="{{ route('about.for-renters') }}" class="navbar-item">
                            For Renters
                        </a>
                        <a href="{{ route('about.for-landlords') }}" class="navbar-item">
                            For Landlords
                        </a>
                        <a href="{{ route('about.contact') }}" class="navbar-item">
                            Contact Us
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
                    <a class="navbar-item" href="{{ route('dashboard.index') }}">
                        Dashboard
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
