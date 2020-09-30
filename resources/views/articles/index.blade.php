@extends('layout2')

@section('content')
<div class="wrapper">

    <div id="wrapper">
        <div id="page" class="contaoiner">
    
        </div>
    </div>
    
    @foreach ($articles as $article)
        <div class="content">
            <div class="title">
                <h2>
                <a href="/articles/{{ $article->id }}">
                    {{ $article->title }}
                </a>
                </h2>
            </div>
        </div>
        <p>
            <img src="/img/banner.jpg" alt="">
        </p>
        {!! $article->excerpt !!}
    
    @endforeach
</div>

@endsection