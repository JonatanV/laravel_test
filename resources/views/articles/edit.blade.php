@extends('layout2')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1>Edit Article</h1>

        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="" for="title">Title</label>

                <div class="control">
                    <input class="input" 
                           type="text"
                           name="title"
                           id="title" 
                           value="{{ old('title') }}"
                           required>

                    @if ($error->has('title'))
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" required>{{ $article->excerpt }}</textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body" required>{{ $article->body }}</textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-text" type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection