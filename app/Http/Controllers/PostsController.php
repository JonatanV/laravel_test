<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post)
    {
        $posts = [
            'my-first-post' => 'First',
            'my-second-post' => 'second'
        ];

        if (!array_key_exists($post, $posts)) {
            abort(404, 'Sorry unavailable post:');
        }

        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
