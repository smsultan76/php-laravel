<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('/test', [PageController::class, 'test']);
Route::get('/test2', [PageController::class, 'test2']);