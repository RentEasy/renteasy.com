<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(View::hasSection('title'))
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <meta name="description" content="@yield('description', config('app.description'))">

    <script src="{{ asset('js/app.js') }}?hash={{ md5_file(public_path('js/app.js')) }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="{{ asset('css/app.css') }}?hash={{ md5_file(public_path('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#556595">

    <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>

    <!-- why is so much social tagging required? -->
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('title', config('app.name'))" />
    <meta property="og:description" content="@yield('description', config('app.description'))" />
    <meta property="og:image" content="@yield('image', asset('img/pittsburgh-row-houses.jpg'))" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@LeasaryHomes">
    <meta name="twitter:creator" content="@yield('creator', '@LeasaryHomes')">
    <meta name="twitter:title" content="@yield('title', config('app.name'))">
    <meta name="twitter:description" content="@yield('description', config('app.description'))">
    <meta name="twitter:image" content="@yield('image', asset('img/pittsburgh-row-houses.jpg'))">

    @yield('head')

</head>
<body>
<main id="app">
    @yield('body')

    <footer class="footer container-margin-top">
        <div class="container">
            <div class="columns">
                <div class="column is-3 is-offset-2">
                    <h2><strong>Subscribe to our Newsletter</strong></h2>
                    <newsletter privacy-route="{{ route('about.privacy') }}"
                                submit-route="{{ route('about.newsletter') }}"></newsletter>
                </div>
                <div class="column is-3">
                    <h2><strong>Blog</strong></h2>
                    <ul>
                        @foreach(\App\Article::orderByDesc('updated_at')->where('online', true)->limit(5)->get() as $article)
                            <li><a href="{{ route('blog.show', $article) }}">{{ $article->title }}</a></li>
                        @endforeach
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
                        <a href="{{ route('about.privacy') }}">Privacy Policy</a> - <a
                            href="{{ route('about.cookie') }}">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>
</body>
</html>
