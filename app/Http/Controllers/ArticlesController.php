<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        //renders a list of a source
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        // Show a single resource

        $article = Article::find($id);

        return view('articles.show',    ['article' => $article]);
    }

    public function create()
    {
        // Shows a view to create a new resource

        return view('articles.create');
    }

    public function store()
    {
        // Persists the create form
        request()->validate([
            'title' => 'requiered',
            'excerpt' => 'requiered',
            'body' => 'requiered'
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        // Shows a view to edit an existing resource
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {
        // Persists the edited resource
        request()->validate([
            'title' => 'requiered',
            'excerpt' => 'requiered',
            'body' => 'requiered'
    ]);

        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy()
    {
        // Delete the rresource
    }
}
