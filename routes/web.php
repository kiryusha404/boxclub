<?php

use Illuminate\Support\Facades\Route;

// лицензионное соглашение
Route::get('/license', [App\Http\Controllers\MainController::class, 'license'])->name('license');

// страница новости
Route::get('/', [App\Http\Controllers\NewsController::class, 'welcome'])->name('welcome');
// страница отдельной новости
Route::get('/new/{id}', [App\Http\Controllers\NewsController::class, 'new'])->name('new');
// добавление коментария
Route::post('/add_comment', [App\Http\Controllers\NewsController::class, 'add_comment'])->name('add_comment')->middleware('auth');

//страница расписание
Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'schedule'])->name('schedule');
//отправление заявки
Route::post('/add_application', [App\Http\Controllers\ScheduleController::class, 'add_application'])->name('add_application')->middleware('auth');
// информация о заявке
Route::get('/application_information', [App\Http\Controllers\ScheduleController::class, 'application_information'])->name('application_information')->middleware('auth');
//удаление заявки
Route::post('/del_application', [App\Http\Controllers\ScheduleController::class, 'del_application'])->name('del_application')->middleware('auth');

//страница о нас
Route::get('/about', [App\Http\Controllers\AboutController::class, 'about'])->name('about');

// страница отзывы
Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'feedback'])->name('feedback');
// удаление отзыва
Route::post('/del_feedback', [App\Http\Controllers\FeedbackController::class, 'del_feedback'])->name('del_feedback')->middleware('auth');
// добавление отзыва
Route::post('/add_feedback', [App\Http\Controllers\FeedbackController::class, 'add_feedback'])->name('add_feedback')->middleware('auth');

//страница тренеры
Route::get('/coach', [App\Http\Controllers\CoachController::class, 'coach'])->name('coach');

//страница наша гордость
Route::get('/boxer', [App\Http\Controllers\BoxerController::class, 'boxer'])->name('boxer');

//авторизация
Auth::routes();



