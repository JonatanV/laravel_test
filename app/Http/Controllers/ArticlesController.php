<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        //renders a list of a source
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {

            $articles = Article::latest()->get();
        }


        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        // Show a single resource

        Article::where('id', 1)->first();
        return view('articles.show',    ['article' => $article]);
    }

    public function create()
    {
        // Shows a view to create a new resource
        Tag::all();
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        // Persists the create form
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        if (request()->has('tags')) {
            $article->tags()->attach(request('tags'));
        } 

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        // Shows a view to edit an existing resource


        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        // Persists the edited resource
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    public function destroy()
    {
        // Delete the rresource
    }
    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
