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

    public function show(Article $article)
    {
        // Show a single resource

         Article::where('id', 1)->first();
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
        Article::create($this->validateArticle());

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
            'body' => 'required'
        ]);
    }
}
