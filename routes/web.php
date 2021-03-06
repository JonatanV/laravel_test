<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

use function PHPUnit\Framework\returnValueMap;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', function() {
    $name = request('name');

    return view('test', [
       'name'=> request('name')
       ]);
});



Route::get('/contact', function() {
    return view('contact');
});
Route::get('/about', function(){
    return view('about', [
        'articles' => App\Models\Article::latest()->get()
        ]);
        
    });
    
    Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
    Route::post('/articles', [ArticlesController::class, 'store']);
    Route::get('/articles/create', [ArticlesController::class , 'create']);
    Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
    Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
    Route::put('/articles/{article}', [ArticlesController::class, 'update']);
    Route::delete('/articles/{article}', [ArticlesController::class, 'delete']);


