@extends('layout2')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>{{ $article->title }}</h2>
            </div>
            <p><img src="/img/banner.jpg" alt="" class="image image-full" /> </p>
            <p>{{ $article->body }}</p>

        </div>

        @endsection