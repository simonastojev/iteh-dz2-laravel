<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', array('as'=>'login', function() {
// return view('auth.login');
// }));


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article/{id}',[App\Http\Controllers\ViewArticleController::class, 'index'])->name('viewArticle');
Route::get('/articleDel/{id}',[App\Http\Controllers\ViewArticleController::class, 'delete'])->name('deleteArticleWeb');

Route::get('/writeArticle',[App\Http\Controllers\WriteArticleController::class, 'index'])->name('writeArticle');

Route::get('/register', array('as'=>'webRegister', function() {
    return view('auth.register');
}));

Route::get('/login', array('as'=>'webLogin', function() {
    return view('auth.login');
}));

//Route::get('/login', [App\Http\Controllers\ViewLoginController::class, 'index'])->name('login');
// Route::get('api/login', array('as'=>'logedin', function() {
// return view('/hom');
// $response = app();
// return redirect('/home');
// }));

// Route::get('api/logout', array('as'=>'logedout', function() {
//     return redirect('aaa');
// }));
// Route::get('/register', array('as'=>'register', function() {
//     return view('auth.register');
// }));
//Route::get('login', [App\Http\Controllers\HomeController::class,'index']);
// Route::get('/auth/logout', function() {
//     return view('welcome');
// });
