<?php

use Illuminate\Support\Facades\Route;

Route::get('/list_hidden', 'main@list_hidden')->name('list_hidden'); 
Route::get('', 'main@home')->name('home');

Route::get('/new_task', 'main@new_task')->name('new_task'); 
Route::post('/new_task_submit', 'main@new_task_submit')->name('new_task_submit');

Route::get('/task_done/{id}', 'main@task_done')->name('task_done');
Route::get('/task_not_done/{id}', 'main@task_not_done')->name('task_not_done');

Route::get('/edit_task_form/{id}', 'main@edit_task')->name('edit_task');
Route::post('/edit_task_submit', 'main@edit_task_submit')->name('edit_task_submit');

Route::get('/task_invisible/{id}', 'main@task_invisible')->name('task_invisible');
Route::get('/task_visible/{id}', 'main@task_visible')->name('task_visible');  

