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
// удаление коментария
Route::post('/del_comment', [App\Http\Controllers\NewsController::class, 'del_comment'])->name('del_comment');

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

//возможности администратора
//админ панель
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
//добавление модератора
Route::post('/add_moder', [App\Http\Controllers\AdminController::class, 'add_moder'])->name('add_moder');
//удаление модератора
Route::post('/del_moder', [App\Http\Controllers\AdminController::class, 'del_moder'])->name('del_moder');
//добавление тренера
Route::post('/add_coach', [App\Http\Controllers\AdminController::class, 'add_coach'])->name('add_coach');
//удаление тренера
Route::post('/del_coach', [App\Http\Controllers\AdminController::class, 'del_coach'])->name('del_coach');
//удаление тренера
Route::post('/del_schedule_admin', [App\Http\Controllers\AdminController::class, 'del_schedule_admin'])->name('del_schedule_admin');


//возможности модератора
//обзор заявок
Route::get('/application', [App\Http\Controllers\ModerController::class, 'application'])->name('application');
//добавление новости
Route::post('/add_news', [App\Http\Controllers\ModerController::class, 'add_news'])->name('add_news');
//удаление новости
Route::post('/del_news', [App\Http\Controllers\ModerController::class, 'del_news'])->name('del_news');
//добавление спортсмена
Route::post('/add_boxer', [App\Http\Controllers\ModerController::class, 'add_boxer'])->name('add_boxer');
//удаление спортсмена
Route::post('/del_boxer', [App\Http\Controllers\ModerController::class, 'del_boxer'])->name('del_boxer');
//удаление комментария
Route::post('/del_comment_moder', [App\Http\Controllers\ModerController::class, 'del_comment_moder'])->name('del_comment_moder');
//добавление позиции рассписания
Route::post('/add_schedule', [App\Http\Controllers\ModerController::class, 'add_schedule'])->name('add_schedule');
//удаления позиции рассписания
Route::post('/del_schedule', [App\Http\Controllers\ModerController::class, 'del_schedule'])->name('del_schedule');

//заявки
//обработка заявки
Route::post('/processing_application', [App\Http\Controllers\ApplicationController::class, 'processing_application'])->name('processing_application');
//завершение заявки
Route::post('/completed_application', [App\Http\Controllers\ApplicationController::class, 'completed_application'])->name('completed_application');

//авторизация
Auth::routes();



