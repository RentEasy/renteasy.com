@extends('layouts.hero')

@section('title', $article->title)
@section('description', $article->description)

@section('head')
    <meta property="og:title" content="{{ $article->title }}" />
    <meta property="og:description" content="{{ $article->description }}" />
    <meta property="og:image" content="{{ asset('img/pittsburgh-row-houses.jpg') }}" />
@endsection

@section('content')
    <div id="blog">

        <section class="hero is-medium is-bold has-background">
            <img src="{{ asset('img/pittsburgh-row-houses.jpg') }}" alt="" class="hero-background">
            <div class="hero-body">
            </div>
        </section>

        <div class="container">
            <!-- START ARTICLE FEED -->
            <section class="articles">
                <div class="column is-8 is-offset-2 is-12-mobile is-offset-0-mobile">

                    <div id="post-7"
                         class="card article">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content has-text-centered">
                                    <h2 class="title article-title">{{ $article->title }}</h2>
                                    <p class="subtitle is-6 article-subtitle">
                                        <a href="#">{{ $article->author->fullName() }}</a> on
                                        <a href="{{ route('blog.show', $article) }}" rel="bookmark">
                                            <time class="entry-date published" datetime="{{ $article->created_at }}">
                                                {{ $article->created_at->format('M d, Y') }}
                                            </time>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="content article-body">
                                {!! $article->body_html !!}
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>

@endsection
