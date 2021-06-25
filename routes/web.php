<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Activity;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->middleware('auth');
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->middleware('auth');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->middleware('auth');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->middleware('auth');
Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->middleware('auth');
Route::patch('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->middleware('auth');
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->middleware('auth');
Route::resource('/projects', App\Http\Controllers\ProjectController::class)->middleware('auth');


Route::post('/projects/{project}/tasks', [App\Http\Controllers\TaskController::class, 'store'])->middleware('auth');
Route::patch('/projects/{project}/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])->middleware('auth');

Route::post('/projects/{project}/invite', [App\Http\Controllers\ProjectInvitationController::class, 'store'])->middleware('auth');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
