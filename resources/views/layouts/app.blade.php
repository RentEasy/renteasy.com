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
                    <h2><strong>Category</strong></h2>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Vestibulum errato isse</a></li>
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Aisia caisia</a></li>
                        <li><a href="#">Murphy's law</a></li>
                        <li><a href="#">Flimsy Lavenrock</a></li>
                        <li><a href="#">Maven Mousie Lavender</a></li>
                    </ul>
                </div>
                <div class="column is-3">
                    <h2><strong>Category</strong></h2>
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
                    <h2><strong>Category</strong></h2>
                    <ul>
                        <li><a href="#">Objects in space</a></li>
                        <li><a href="#">Playing cards with coyote</a></li>
                        <li><a href="#">Goodbye Yellow Brick Road</a></li>
                        <li><a href="#">The Garden of Forking Paths</a></li>
                        <li><a href="#">Future Shock</a></li>
                    </ul>
                </div>
            </div>
            <div class="content has-text-centered">
                <p>
                    <a class="icon" href="https://github.com/BulmaTemplates/bulma-templates">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
                <div class="control level-item">
                    <a href="https://github.com/BulmaTemplates/bulma-templates">
                        <div class="tags has-addons">
                            <span class="tag is-dark">Bulma Templates</span>
                            <span class="tag is-info">MIT license</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</main>
</body>
</html>
