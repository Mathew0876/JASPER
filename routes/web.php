<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequirementModelController;
use App\Http\Controllers\ImportController;
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

Route::get('/add/{id?}', function ($id = null) {
    return view('add', ['users'=>User::all()->except([Auth::user()->id]),
                        'requirement'=>RequirementModel::find($id)]);
})->middleware(['auth'])->name('add');

Route::post('/add', [RequirementModelController::class, 'store'])
->middleware(['auth'])->name('requirementModelController.store');

Route::post('/add/{id}', [RequirementModelController::class, 'update'])
->middleware(['auth'])->name('requirementModelController.update');

Route::get('/requirements', function () {
    return view('requirements', ['requirements'=>RequirementModel::all()]);
})->middleware(['auth'])->name('requirements');

Route::get('/view-requirement/{id}', function ($id) {
    return view('view-requirement', ['viewRequirement'=>RequirementModel::find($id)]);
})->middleware(['auth'])->name('view-requirement');

Route::get('/import', function () {
  return view('import');
})->middleware(['auth'])->name('import');

Route::post('/import', [ImportController::class, 'uploadFile'])
->middleware(['auth'])->name('importController.uploadFile');

require __DIR__.'/auth.php';
