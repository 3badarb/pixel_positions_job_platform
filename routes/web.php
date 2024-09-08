<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Support\Facades\Route;



Route::get('/', [JobController::class,'index']);
Route::get('/search',SearchController::class);
Route::get('/tag/{tag:name}',TagController::class);

Route::get('/job/create',[JobController::class,'create'])->middleware('auth');
Route::post('/job/create',[JobController::class,'store'])->middleware('auth');
Route::get('/myjobs',[JobController::class,'myjobs'])->middleware('auth');

Route::delete('/delete/{job}',[JobController::class,'delete'])->
                                middleware('auth')->can('edit','job');
Route::get('/edit/{job}',[JobController::class,'edit'])->
                                middleware('auth')->can('edit','job');
Route::patch('/job/update/{job}',[JobController::class,'update'])->
                                middleware('auth')->can('edit','job');
Route::middleware('guest')->group(function (){
    Route::get('/register', [SessionController::class,'registerPage']);
    Route::post('/register', [SessionController::class,'doRegister']);
    Route::get('/login', [SessionController::class,'loginPage'])->name('login');
    Route::post('/login', [SessionController::class,'doLogin']);
});



Route::post('/logout', [SessionController::class,'logout'])->middleware('auth');


