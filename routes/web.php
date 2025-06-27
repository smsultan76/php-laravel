<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function(){ 
//     return 'Test SM';
// });

// Route::get('/test2', function(){
//     return view('test', 
//         ['massage' => 'Test SM 2']);
// });

Route::get('/index', function(){
    return view('index');
})->name('home');
Route::get('/', [PageController::class, 'index']);
// Route::get('/crete', [PageController::class, 'create']);

Route::get('/Post/create', [PostController::class, 'create']);

Route::post('/Post/store', [PostController::class, 'PCstore'])->name('Post.store');