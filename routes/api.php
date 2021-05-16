<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('articles', [ArticleController::class , 'index']);

Route::get('articles/{id}', [ArticleController::class, 'show']);

Route::post('articles', [ArticleController::class, 'store']);

Route::put('articles/{article}', [ArticleController::class, 'update']);

Route::delete('articles/{article}', [ArticleController::class, 'delete']);

Route::get('divisions', function() {
    return \App\Models\Division::all();
});

Route::post('divisions', function(Request $request) {
    return \App\Models\Division::create($request->all());
});


Route::get('divisions/{id}', function($id) {
    return \App\Models\Division::find($id);
});

Route::get('divisions/{id}/all', function($id) {
    return \App\Models\Division::find($id)->divisions;
});

Route::get('divisions/{id}/superior', function($id) {
    return \App\Models\Division::find($id)->parent;
});

Route::put('divisions/{id}', function(Request $request, $id) {
    $division = \App\Models\Division::findOrFail($id);
    $division->update($request->all());
    return $division;
});


Route::delete('divisions/{id}', function($id) {
    $division = \App\Models\Division::find($id)->delete();
    return 204;
});

// Route::get('articles', function() {
//     return \App\Models\Article::all();
// });

// Route::get('articles/{id}', function($id) {
//     return \App\Models\Article::find($id);
// });

// Route::post('articles', function(Request $request) {
//     return Article::create($request->all);
// })

// Route::post('articles/{id}', function(Request $request) {
//     $article = \App\Models\Article::findOrFail($id);
//     $article->update($request->all());
//     return $article;
// })

// Route::delete('articles/{id}', function($id) {
//     \App\Models\Article::find($id)->delete();
//     return 204
// })
