<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequirementModelController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/add', function () {
    return view('add');
})->middleware(['auth'])->name('add');

Route::post('/add', [RequirementModelController::class, 'store'])
->middleware(['auth'])->name('requirementModelController.store');

Route::get('/requirements', function () {
    return view('requirements');
})->middleware(['auth'])->name('requirements');

require __DIR__.'/auth.php';
