<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['2fa'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function(){
        return redirect(route('home'));
    })->name('2fa');
});

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');

Route::get('/projects', [ProjectController::class, 'myProject'])->name('projects.myProject');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/profile', [UserController::class, 'show'])->name('profile.user');
