<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', fn () => view('admin.index'))->name('index');

    Route::get('login', fn () => view('admin.login'))->name('login');

    Route::get('ui-elements', fn () => view('admin.ui-elements'))->name('ui-elements');

    Route::get('tables', fn () => view('admin.tables'))->name('tables');

    Route::get('forms', fn () => view('admin.forms'))->name('forms');

});

require __DIR__ . '/auth.php';
