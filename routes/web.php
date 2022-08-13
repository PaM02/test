<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
// c'est trois fonction c'est la meme chose

/*Route::get('/',[ function () {
    return view('welcome');
}]);*/

Route::get('/', '\App\Http\Controllers\PostController@index')->name('welcome');
Route::get('/articles', '\App\Http\Controllers\PostController@articles')->name('articles');
//getnous renvoit le formulaire html
Route::get('/article/create', [PostController::class, 'create'])->name('article.create');
Route::post('/article/create', [PostController::class, 'store'])->name('article.store');
Route::get('/article/{id}', [PostController::class, 'show'])->name('article.show');
//Route::get('/article/{id}', [PostController::class, 'show'])->whereNumber('id')->name('article');
Route::get('/contactez-nous', [PostController::class, 'contact'])->name('contact');

//Route::get('/', [PostController::class, 'index']);

/*Route::get('posts', function () {
    return 'liste d\'article';
});*/

//format json
/*Route::get('posts', function () {
    return response()->json([
        'cle' => 'valeur',
        'cle1' => 'valeur'
    ]);
});*/
