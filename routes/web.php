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

Route::get('/documents', 'DocumentController@index')->name('index-documents');
Route::get('/storage/documents/{document_path}','DocumentController@read')->name('read-document');
Route::get('/storage/documents/download/{document_path}','DocumentController@download')->name('download-document');

Route::prefix('programs')->group(function(){
    Route::get('/','ProgramController@index')->name('catalog-programs');
    Route::get('/{program_id}','ProgramController@detail')->name('detail-program');
});

Route::middleware('auth')->group(function(){
    Route::middleware('permission:listener-own-request-edit')->group(function(){
        Route::get('/programs/{program_id}/listener-request','ListenerRequestController@showCreateForm')->name('create-form-listener-request');
        Route::post('/programs/{program_id}/listener-request','ListenerRequestController@store')->name('create-listener-request');

        Route::get('/listener-requests','ListenerRequestController@index')->name('list-listener-requests');
        Route::get('/listener-requests/{listener_request_id}','ListenerRequestController@detail')->name('detail-listener-request');
        Route::get('/listener-requests/{listener_request_id}/edit','ListenerRequestController@showEditForm')->name('edit-form-listener-request');
        Route::post('/listener-requests/{listener_request_id}','ListenerRequestController@save')->name('edit-listener-request');
        Route::delete('/listener-requests/{listener_request_id}','ListenerRequestController@delete')->name('delete-listener-request');

        Route::get('/user-review','UserReviewController@showCreateForm')->name('create-form-user-review');
        Route::post('/user-review','UserReviewController@store')->name('create-user-review');
        Route::get('/user-review/edit','UserReviewController@showEditForm')->name('edit-form-user-review');
        Route::post('/user-review/edit','UserReviewController@save')->name('edit-user-review');
        Route::delete('/user-review','UserReviewController@delete')->name('delete-user-review');
        Route::get('/user-reviews/{user_review_id}','UserReviewController@detail')->name('detail-user-review');
    });

    Route::get('/profile','UserController@userProfile')->name('profile');
    Route::get('/profile/edit','UserController@showEditForm')->name('edit-profile');
    Route::post('/profile/edit','UserController@save')->name('save-profile');
    Route::get('/profile/change-password','UserController@showPasswordEditForm')->name('edit-password');
    Route::post('/profile/change-password','UserController@passwordSave')->name('save-password');
});

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/panel','AdminController@index')->name('admin-panel');

    Route::get('/programs','AdminProgramController@index')->name('admin-index-programs');
    Route::get('/programs/create','AdminProgramController@create')->name('admin-create-form-program');
    Route::post('/programs/create','AdminProgramController@store')->name('admin-create-program');
    Route::get('/programs/{program_id}','AdminProgramController@detail')->name('admin-detail-program');
    Route::get('/programs/{program_id}/edit','AdminProgramController@edit')->name('admin-edit-form-program');
    Route::post('/programs/{program_id}/edit','AdminProgramController@save')->name('admin-edit-program');
    Route::delete('/programs','AdminProgramController@delete')->name('admin-delete-program');

    Route::get('/users','AdminUserController@index')->name('admin-index-users');
    Route::get('/users/create','AdminUserController@showCreateForm')->name('admin-create-form-user');
    Route::post('/users/create','AdminUserController@store')->name('admin-create-user');
    Route::get('/users/{user_id}','AdminUserController@detail')->name('admin-detail-user');
    Route::get('/users/{user_id}/edit','AdminUserController@showEditForm')->name('admin-edit-form-user');
    Route::post('/users/{user_id}/edit','AdminUserController@save')->name('admin-edit-user');
    Route::delete('/users/{user_id}','AdminUserController@delete')->name('admin-delete-user');

    Route::get('/documents','AdminDocumentController@index')->name('admin-index-documents');
    Route::get('/documents/upload','AdminDocumentController@uploadForm')->name('admin-upload-form-document');
    Route::post('/documents/upload','AdminDocumentController@store')->name('admin-upload-document');
    Route::delete('/documents/{document_id}','AdminDocumentController@delete')->name('admin-delete-document');

    Route::get('/listeners-requests','AdminListenerRequestController@index')->name('admin-list-listeners-requests');
    Route::get('/listeners-requests/{listener_request_id}','AdminListenerRequestController@detail')->name('admin-detail-listener-request');
    Route::get('/listeners-requests/{listener_request_id}/edit','AdminListenerRequestController@showEditForm')->name('admin-edit-form-listener-request');
    Route::post('/listeners-requests/{listener_request_id}/edit','AdminListenerRequestController@save')->name('admin-edit-listener-request');
    Route::delete('/listeners-requests/{listener_request_id}','AdminListenerRequestController@delete')->name('admin-delete-listener-request');
});

require __DIR__.'/auth.php';
