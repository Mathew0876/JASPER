<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequirementModelController;
use App\Models\User;
use App\Models\RequirementModel;
use Illuminate\Support\Facades\Auth;


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
    return view('add', ['users'=>User::all()->except([Auth::user()->id])]);
})->middleware(['auth'])->name('add');

Route::post('/add', [RequirementModelController::class, 'store'])
->middleware(['auth'])->name('requirementModelController.store');

Route::get('/requirements', function () {
    return view('requirements', ['requirements'=>RequirementModel::all()]);
})->middleware(['auth'])->name('requirements');

Route::get('/view-requirement', function () {
    return view('view-requirement');
})->middleware(['auth'])->name('view-requirement');

require __DIR__.'/auth.php';
