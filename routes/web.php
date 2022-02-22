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

Route::get('/', 'AppController@home')->name('home');
Route::get('/about', 'AppController@about')->name('about');

Route::get('/documents', 'DocumentController@index')->name('docs');

Route::middleware(['permission:course-edit'])->get('/documents/upload', 'HomeController@docsUpload')->name('docs-upload');

Route::get('courses', 'CourseController@main')->name('courses-main-page');
Route::get('courses/{course_id}', 'CourseController@detailCourse');

Route::middleware('role:listener')->group(function(){
    Route::post('courses/{course_id}','ListenerRequestController@store')->name('listener-request-create');
});

Route::middleware('role:admin')->group(function(){

});



Route::middleware(['auth','permission:listener-request-edit'])->prefix('admin')->group( function() {
    Route::get('/listeners-requests','AdminListenerRequestController@index')->name('listeners-requests');
    Route::get('/listeners-requests/{id}','AdminListenerRequestController@show')->name('listeners-requests-show');
    Route::delete('/listeners-requests/{id}','ListenerRequestController@delete')->name('listeners-requests-delete');
});

Route::middleware(['auth'])->prefix('profile')->group( function() {
    Route::get('/','UserController@profile')->name('profile');
    Route::get('/edit','UserController@edit');
    Route::post('/','UserController@update')->name('profile-edit');
    Route::get('/edit-pass','UserController@editPass');
    Route::middleware(['permission:listener-own-request-edit'])->get('/listener-requests','ListenerRequestController@index')->name('listener-own-requests-index');
});
Route::middleware(['auth'])->prefix('profile')->group( function() {

    Route::middleware(['permission:course-edit'])->get('/courses','CourseController@allCourses')->name('all-courses-list');
    Route::middleware(['permission:course-edit'])->get('/courses/create','CourseController@showEditForm')->name('course-create');
    Route::middleware(['permission:course-edit'])->get('/courses/{id}', 'CourseController@showEditForm')->name('course-edit');
    Route::middleware(['permission:course-edit'])->post('/courses','CourseController@update');
    Route::middleware(['permission:course-edit'])->delete('/courses','CourseController@delete')->name('course-delete');
});

Route::middleware(['auth'])->group( function() {

    Route::middleware(['permission:request-edit'])->group( function() {
    Route::get('/profile/requests','RequestController@index')->name('all-requests');
    Route::get('/profile/requests/{id}','RequestController@detail');
    Route::delete('/profile/requests','RequestController@delete')->name('request-delete');
    });
});

require __DIR__.'/auth.php';
