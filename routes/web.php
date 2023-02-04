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

Route::get('/documents', 'DocumentController@index')->name('documents-index');
Route::get('/documents/{document_id}','DocumentController@open')->name('document-open');
Route::get('/documents/{document_id}/download','DocumentController@download')->name('document-download');

Route::prefix('programs')->group(function(){
    Route::get('/','ProgramController@index')->name('programs-index');
    Route::get('/{program_id}','ProgramController@detail')->name('program-detail');
});

// Authorized Users
// Can make review and edit profile

Route::middleware('auth')->group(function(){
    Route::middleware('permission:listener-own-request-edit')->group(function(){
        Route::get('/review/create','ReviewController@create')->name('review-create');
        Route::post('/review/create','ReviewController@store')->name('review-store');
        Route::get('/review/{request_id}/detail','ReviewController@detail')->name('review-detail');
        Route::get('/review/{request_id}/edit','ReviewController@edit')->name('review-edit');
        Route::post('/review/{request_id}/save','ReviewController@save')->name('review-save');
        Route::delete('/review/{request_id}','ReviewController@delete')->name('review-delete');
    });

    Route::get('/profile','UserController@detail')->name('profile-detail');
    Route::get('/profile/edit','UserController@edit')->name('profile-edit');
    Route::post('/profile/edit','UserController@save')->name('profile-save');
});

// Admin Panel

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/panel','Admin\AdminController@index')->name('admin-panel');

    Route::get('/programs','Admin\AdminProgramController@index')->name('admin-programs-index');
    Route::get('/programs/create','Admin\AdminProgramController@create')->name('admin-program-create');
    Route::post('/programs/create','Admin\AdminProgramController@store')->name('admin-program-store');
    Route::get('/programs/{program_id}','Admin\AdminProgramController@detail')->name('admin-program-detail');
    Route::get('/programs/{program_id}/edit','Admin\AdminProgramController@edit')->name('admin-program-edit');
    Route::post('/programs/{program_id}/edit','Admin\AdminProgramController@save')->name('admin-program-save');
    Route::delete('/programs/{program_id}','Admin\AdminProgramController@delete')->name('admin-program-delete');

    Route::get('/users','Admin\AdminUserController@index')->name('admin-users-index');
    Route::get('/users/{user_id}','Admin\AdminUserController@detail')->name('admin-user-detail');
    Route::delete('/users/{user_id}','Admin\AdminUserController@delete')->name('admin-user-delete');

    Route::get('/documents','Admin\AdminDocumentController@index')->name('admin-documents-index');
    Route::get('/documents/upload','Admin\AdminDocumentController@uploadForm')->name('admin-document-upload');
    Route::post('/documents/upload','Admin\AdminDocumentController@store')->name('admin-document-store');
    Route::delete('/documents/{document_id}','Admin\AdminDocumentController@delete')->name('admin-document-delete');

    Route::get('/reviews','Admin\AdminReviewController@index')->name('admin-requests-index');
    Route::get('/reviews/{review_id}','Admin\AdminReviewController@edit')->name('admin-request-detail');
    Route::get('/reviews/create','Admin\AdminReviewController@create')->name('admin-request-create');
    Route::post('/reviews/create','Admin\AdminReviewController@store')->name('admin-request-store');
    Route::get('/reviews/{review_id}/edit','Admin\AdminReviewController@edit')->name('admin-request-edit');
    Route::post('/reviews/{review_id}/edit','Admin\AdminReviewController@save')->name('admin-request-save');
    Route::delete('/reviews/{review_id}','Admin\AdminReviewController@delete')->name('admin-request-delete');
});

require __DIR__.'/auth.php';
