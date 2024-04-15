<?php

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


// лицензионное соглашение
Route::get('/license', [App\Http\Controllers\MainController::class, 'license'])->name('license');

// страница новости
Route::get('/', [App\Http\Controllers\MainController::class, 'welcome'])->name('welcome');
// страница отдельной новости
Route::get('/new/{id}', [App\Http\Controllers\MainController::class, 'new'])->name('new');
// добавление коментария
Route::post('/add_comment', [App\Http\Controllers\MainController::class, 'add_comment'])->name('add_comment')->middleware('auth');

// страница отзывы
Route::get('/feedback', [App\Http\Controllers\MainController::class, 'feedback'])->name('feedback');
// удаление отзыва
Route::post('/del_feedback', [App\Http\Controllers\MainController::class, 'del_feedback'])->name('del_feedback')->middleware('auth');
// добавление отзыва
Route::post('/add_feedback', [App\Http\Controllers\MainController::class, 'add_feedback'])->name('add_feedback')->middleware('auth');


Auth::routes();



