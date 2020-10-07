@extends('layout2')

@section('content')
<div class="wrapper">

    <div id="wrapper">
        <div id="page" class="container">

        </div>
    </div>

    @forelse ($articles as $article)

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h2>
                </div>
                <p><img src="/img/banner.jpg" alt="" class="image image-full" /> </p>
                <p>{{ $article->excerpt }}</p>

            </div>
        </div>
        @empty
        <p>
            No relevant articles yet.
            @endforelse

        @endsection