<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use \App\Http\Livewire\ShowThreads;
use \App\Http\Livewire\ShowThread;

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
Route::get('/',ShowThreads::class)->middleware(['auth'])->name('dashboard');
Route::get('/thread/{thread}',ShowThread::class)->middleware(['auth'])->name('thread');

Route::middleware('auth')->group(function(){


    Route::resource('threads',ThreadController::class)->except(['show','index','destroy']);
});

require __DIR__.'/auth.php';
