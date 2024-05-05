<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::get('/', function () {return view('welcome');});
//動画の検索
Route::get('/movies/crud', [MovieController::class, 'exeCrud'])->name('crud');
//動画タグの一覧表示
Route::get('/movies/tag',[MovieController::class, 'showTags'])->name('tag');
//動画一覧を表示・検索結果を表示
Route::get('/movies', [MovieController::class, 'movies'])->name('movie');
//動画登録画面を表示
Route::get('/movies/create', [MovieController::class, 'showCreate'])->name('create');
//動画の登録を実行
Route::post('/movies/store', [MovieController::class, 'exeStore'])->name('store');
//動画の詳細の表示
Route::get('/movies/{id}',[MovieController::class, 'showDetail'])->name('detail');
//動画編集画面の表示
Route::get('/movies/edit/{id}',[MovieController::class, 'showEdit'])->name('edit');
//動画の更新を実行
Route::post('/movies/update', [MovieController::class, 'exeUpdate'])->name('update');
//動画の削除
Route::post('/movies/delete/{id}', [MovieController::class, 'exeDelete'])->name('delete');


