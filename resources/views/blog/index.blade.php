@extends('layouts.hero')

@section('title', 'Blog')

@section('content')

    <div id="blog" class="container">
        <section class="articles">
            <div class="column is-8 is-offset-2">


                @foreach($articles as $article)
                <div id="post-{{ $article->id }}" class="card post article">
                    <div class="card-image">
                        <figure class="image is-16x9">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content has-text-centered">
                                <h3 class="title article-title">
                                    <a href="{{ route('blog.show', $article) }}" rel="bookmark">{{ $article->title }}</a>
                                </h3>
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

                            {{ $article->description }}

                            <br>
                            <br>

                            <a href="{{ route('blog.show', $article) }}">Read more!</a>

                            <br>
                            <br>


                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </section>
    </div>

@endsection
