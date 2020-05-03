<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}?hash={{ md5_file(public_path('js/app.js')) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?hash={{ md5_file(public_path('css/app.css')) }}" rel="stylesheet">
</head>
<body>
<main id="app">
    @yield('body')

    <footer class="footer container-margin-top">
        <div class="container">
            <div class="columns">
                <div class="column is-3 is-offset-2">
                    <h2><strong>Subscribe to our Newsletter</strong></h2>
                    <form action="" method="POST" accept-charset="utf-8">
                        <div class="field">
                            <div class="control has-icons-left is-expanded">
                                <input type="email" name="email" class="input is-medium is-flat"
                                       placeholder="Your Email" required>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>

                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </div>


                        <div class="field">
                            <div class="control">
                                <button class="button is-medium is-link">
                                    <strong>Subscribe</strong>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="column is-3">
                    <h2><strong>Blog</strong></h2>
                    <ul>
                        <li><a href="#">Labore et dolore magna aliqua</a></li>
                        <li><a href="#">Kanban airis sum eschelor</a></li>
                        <li><a href="#">Modular modern free</a></li>
                        <li><a href="#">The king of clubs</a></li>
                        <li><a href="#">The Discovery Dissipation</a></li>
                        <li><a href="#">Course Correction</a></li>
                        <li><a href="#">Better Angels</a></li>
                    </ul>
                </div>
                <div class="column is-4">
                    <h2><strong>About</strong></h2>
                    <ul>
                        <li><a href="{{ route('about.company') }}">Our Company</a></li>
                        <li><a href="{{ route('about.for-landlords') }}">{{ config('app.name') }} For Landlords</a></li>
                        <li><a href="{{ route('about.for-renters') }}">{{ config('app.name') }} For Renters</a></li>
                    </ul>
                </div>
            </div>
            <div class="content has-text-centered">
                <div class="control level-item">
                    Copyright © 2020 Leasary - Proudly made in Pittsburgh, PA
                </div>
                <div class="control level-item">
                    <div class="content">
                        <a href="{{ route('about.privacy') }}">Privacy Policy</a> - <a href="{{ route('about.cookie') }}">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>
</body>
</html>
