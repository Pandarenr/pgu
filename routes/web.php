<?php

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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('courses', 'CourseController@main')->name('courses-main-page');
Route::get('courses/{course_id}', 'CourseController@detailCourse');
Route::middleware(['auth','permission:own-request-edit'])->post('courses/{course_id}','CourseController@createRequest')->name('user-subscribe-request');

Route::middleware(['auth'])->prefix('profile')->group( function() {
    Route::get('/','UserController@profile')->name('profile');
    Route::get('/edit','UserController@showEditForm')->name('edit-profile');
    Route::post('/edit','UserController@update');

    Route::middleware(['permission:own-course-edit'])->get('/courses','CourseController@ownCourses')->name('user-courses-list');
    Route::middleware(['permission:course-edit'])->get('/courses','CourseController@allCourses')->name('all-courses-list');
    Route::middleware(['permission:course-edit'])->get('/courses/create','CourseController@showEditForm')->name('course-create');
    Route::middleware(['permission:course-edit'])->get('/courses/{id}', 'CourseController@showEditForm')->name('course-edit');
    Route::middleware(['permission:course-edit'])->post('/courses','CourseController@update');
    Route::middleware(['permission:course-edit'])->delete('/courses','CourseController@delete')->name('course-delete');
});

require __DIR__.'/auth.php';
