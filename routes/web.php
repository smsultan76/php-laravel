<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('index/search',[PostController::class, 'search'])->name('index.search');

Route::get('/index', function(){
    return view('index',['posts'=>Post::simplePaginate(6)]);
})->name('home');
Route::get('/', [PageController::class, 'index']);
Route::get('/test', [PageController::class, 'test']);


Route::get('/Post/create', [PostController::class, 'create']);

Route::post('/Post/store', [PostController::class, 'PCstore'])->name('Post.store');



Route::get('/Post/edit/{Id}', [PostController::class, 'edit'])->name('Post.edit');  
Route::post('/Post/update/{Id}', [PostController::class, 'update'])->name('Post.update');
Route::delete('/Post/delete/{Id}', [PostController::class, 'deleteData'])->name('Post.delete');