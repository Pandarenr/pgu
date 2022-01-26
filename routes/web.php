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

Route::get('courses', 'CoursesController@allData')->name('courses');
Route::get('courses/{course_id}', 'CoursesController@detailCourse');
Route::get('profile/{id}','UserController@profile');
Route::get('profile/{id}/courses','CoursesController@index')->name('profile-courses');
Route::get('profile/{id}/courses/create','CoursesController@create');
route::post('profile/{id}/courses/create','CoursesController@store')->name('profile-course-create');

require __DIR__.'/auth.php';
