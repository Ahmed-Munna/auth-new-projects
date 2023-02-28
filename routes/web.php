<?php

use App\Http\Controllers\catagoryConrtoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\subCategoryControler;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/contact',[ProfileController::class, 'contact'])->name('contact');
Route::get('/content',[ProfileController::class, 'content'])->name('content');

// catagory

Route::get('/catagory', [catagoryConrtoller::class, 'index'])->name('catagory');
// add catagory route
Route::post('/catagory/insert', [catagoryConrtoller::class, 'insart']);
// delete catagory
Route::get('/catagory/delete/{delete_catagory}', [catagoryConrtoller::class, 'delete']);
// edit catagory
Route::get('/catagory/edit/{edit_catagory}', [catagoryConrtoller::class, 'edit']);
Route::post('/catagory/update/', [catagoryConrtoller::class, 'update']);

// sub category
Route::get('/subcatagory', [subCategoryControler::class, 'index']);
Route::post('/subcatagory/insert', [subCategoryControler::class, 'insert']);
Route::get('/subcatagory/delete/{delete_subcatagory}', [subCategoryControler::class, 'delete']);
Route::get('/subcatagory/edit/{edit_subcatagory}', [subCategoryControler::class, 'edit']);
Route::post('/subcatagory/update/', [subCategoryControler::class, 'update']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
