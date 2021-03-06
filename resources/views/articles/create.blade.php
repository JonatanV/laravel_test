@extends('layout2')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1>New Article</h1>

        <form method="POST" action="/articles">
            @csrf

            <div class="field">
                <label class="" for="title">Title</label>

                <div class="control">
                    <input class="input" type="text" name="title" id="title">
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Tags</label>
                <div class="control">
                    <select 
                        name="tags[]"
                        multiple
                        >
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')

                    <p class=" help is-danger">{{ $errors->first('tags') }}</p>

                    @enderror
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